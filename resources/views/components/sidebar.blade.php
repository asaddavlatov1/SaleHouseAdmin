<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
       <li class="nav-item">
           <a href="{{ route('admin.user.index') }}" class="nav-link">
               <i class="nav-icon fa fa-users"></i>
               <p>
                   @lang('attributes.users')
               </p>
           </a>
       </li>
       <li class="nav-item">
           <a href="{{ route('admin.company.index') }}" class="nav-link">
               <i class="nav-icon fas fa-th"></i>                      
                    <p>
                        @lang('attributes.company')
                    </p>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a href="{{ route('admin.companies.index') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>                      
                     <p>
                         @lang('attributes.companies')
                     </p>
             </a>
         </li> --}}
       {{-- <li class="nav-item">--}}
{{--            <a href="{{ route('admin.restaurants.index') }}" class="nav-link">--}}
{{--                <i class="nav-icon fa fa-home"></i>--}}
{{--                <p>--}}
{{--                    @lang('attributes.restaurants')--}}
{{--                </p>--}}
{{--            </a>--}}
{{--        </li>
{{--        <li class="nav-item">--}}
{{--            <a href="{{ route('admin.categories.index') }}" class="nav-link">--}}
{{--                <i class="nav-icon fas fa-th"></i>--}}
{{--                <p>--}}
{{--                    @lang('attributes.category')--}}
{{--                </p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a href="{{ route('admin.reasons.index') }}" class="nav-link">--}}
{{--                <i class="nav-icon fa fa-magic"></i>--}}
{{--                <p>--}}
{{--                    @lang('attributes.reasons')--}}
{{--                </p>--}}
{{--            </a>--}}
{{--        </li> --}}
    </ul>
</nav>
