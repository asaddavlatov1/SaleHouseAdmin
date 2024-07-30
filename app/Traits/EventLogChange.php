<?php

namespace App\Traits;

use App\Enums\EventType;
use App\Jobs\EventLogsJob;
use App\Models\Event;
use App\Models\User;

trait EventLogChange
{
    protected static function bootEventLogChange(): void
    {
        static::created(function ($model) {
            static::logCreateEvent(EventType::CREATE->value, $model);
        });

        static::updated(function ($model) {
            static::logUpdateEvent(EventType::UPDATE->value, $model);
        });

        static::deleted(function ($model) {
            static::logDeleteEvent(EventType::DELETE->value, $model);
        });
    }

    private static function logCreateEvent($action, $model): void
    {
        $logData = [
            'event_type'   => $action,
            'subject_type' => static::class,
            'subject_id'   => $model->id,
            'user_id'      => auth()->id(),
            'after_state'  => json_encode($model->getAttributes()),
        ];

        EventLogsJob::dispatch($logData);
    }

    private static function logUpdateEvent($action, $model): void
    {
        $logData = [
            'event_type'   => $action,
            'subject_type' => static::class,
            'subject_id'   => $model->id,
            'user_id'      => auth()->id(),
            'before_state' => json_encode($model->getOriginal()),
            'after_state'  => json_encode($model->getAttributes()),
        ];

        EventLogsJob::dispatch($logData);
    }

    private static function logDeleteEvent($action, $model): void
    {
        $logData = [
            'event_type'   => $action,
            'subject_type' => static::class,
            'subject_id'   => $model->id,
            'user_id'      => auth()->id(),
        ];

        EventLogsJob::dispatch($logData);
    }

    //relations
    public function eventLogs()
    {
        return $this->morphMany(Event::class, 'subject');
    }

    public function eventCreate()
    {
        return $this->morphOne(Event::class, 'subject')->where('event_type', EventType::CREATE->value);
    }

    public function eventUpdate()
    {
        return $this->morphOne(Event::class, 'subject')->where('event_type', EventType::UPDATE->value)->latest();
    }

    public function eventDelete()
    {
        return $this->morphOne(Event::class, 'subject')->where('event_type', EventType::DELETE->value);
    }

    public function createdBy()
    {
        //write relation with polymorphic and through
        return $this->hasOneThrough(User::class, Event::class, 'subject_id', 'id', 'id', 'user_id')
            ->where('event_type', EventType::CREATE->value);
    }

    public function updatedBy()
    {
        //write relation with polymorphic and through
        return $this->hasOneThrough(User::class, Event::class, 'subject_id', 'id', 'id', 'user_id')
            ->where('event_type', EventType::UPDATE->value)
            ->latest();
    }

    public function deletedBy()
    {
        //write relation with polymorphic and through
        return $this->hasOneThrough(User::class, Event::class, 'subject_id', 'id', 'id', 'user_id')
            ->where('event_type', EventType::DELETE->value);
    }

}
