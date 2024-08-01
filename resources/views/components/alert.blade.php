@if (session()->has('success'))
    <script>
        toastr.success("{{ session('success') }}")
    </script>
@endif
@if ($errors->any())
    @foreach($errors->all() as $error)
        <script>
            toastr.error('{{ $error }}')
        </script>
    @endforeach
@endif
<script>
    const toaster = document.querySelector('.toast-placement-ex');
    if (toaster) {
        setTimeout(() => {
            toaster.classList.remove('show')
            toaster.classList.add('hide')
        }, 2000);
    }
</script>


<script type="text/javascript">

    $('.show_confirm').click(function (event) {
        let form = $(this).closest("form");
        event.preventDefault();
        Swal.fire({
            title: "Siz bu malumotni o'chirishni istaysizmi?",
            icon: 'warning',
            confirmButtonText: "@lang('alerts.confirm_deletion')",
            cancelButtonText: "Yo'q bekor qilish!",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });

</script>
