<?= $this->extend('layouts/auth'); ?>
<?= $this->section('content'); ?>

    <form id="form" method="post" class="mt-6">
        <div>
            <div class="flex-items relative">
                <label for="no_wa" class="absolute left-3">
                    <img src="/assets/icons/phone.svg" alt="No. WhatsApp" class="size-5">
                </label>
                <input type="text" name="no_wa" id="no_wa" inputmode="numeric" placeholder="No. WhatsApp" autocomplete="off" class="no_wa-input w-full input-success px-4 pl-10 py-2 rounded-md placeholder-primary" value="<?= old('no_wa'); ?>">
            </div>
            <span class="no_wa-error text-xs text-red-500 hidden"></span>
        </div>

        <div>
            <div class="mt-4 flex-items relative">
                <label for="password" class="absolute left-3">
                    <img src="/assets/icons/key.svg" alt="Password" class="size-5">
                </label>
                <input type="password" name="password" id="password" placeholder="Kata Sandi" autocomplete="off" class="password-input w-full input-success px-4 pl-10 py-2 rounded-md placeholder-primary">
                <button type="button" class="toggle-password absolute right-3" data-input="#password">
                    <img src="/assets/icons/eye.svg" class="size-5">
                </button>
            </div>
            <span class="password-error text-xs text-red-500 hidden"></span>
        </div>

        <div class="mt-1 w-full flex-between-center">
            <div class="flex-items gap-1.5">
                <!-- Checkbox -->
                <div>
                    <label class="relative flex items-center rounded-full cursor-pointer" htmlFor="amber">
                    <input id="remember" type="checkbox" name="remember_me"
                        class="before:content[''] peer relative h-3.5 w-3.5 cursor-pointer appearance-none rounded-sm border border-success transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-success before:opacity-0 before:transition-opacity checked:border-success checked:bg-success checked:before:bg-success hover:before:opacity-10"
                        id="amber" />
                        <span
                            class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor"
                            stroke="currentColor" stroke-width="1">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </label>
                </div>
                <!-- End Checkbox -->
                <label for="remember" class="text-xs">Ingat Saya</label>
            </div>

            <a href="/forgot-password" class="text-primary underline text-xs font-medium">Lupa Kata Sandi?</a>
        </div>

        <div class="mt-6 w-full flex-justify">
            <button class="button flex-center px-8 py-2.5 rounded-md">
                <?= $this->include('components/loading/button'); ?>
                <span>Masuk</span>
            </button>
        </div>

        <div class="mt-6">
            <p class="text-xs text-center">Belum memiliki akun? <a href="<?= base_url('/register') ?>" class="link-underline text-success font-medium">Daftar disini</a></p>
        </div>
    </form>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="/assets/js/password.js"></script>
<script>
    const inputs = ['no_wa', 'password']

    $(function() {
        $('#form').on('submit', function(e) {
            inputs.map((value) => {
                $(`.${value}-input`).addClass('input-success')
                $(`.${value}-input`).removeClass('input-error')
                $(`.${value}-error`).addClass('hidden')
                $(`.${value}-error`).text('')
            })
            e.preventDefault()
            const formData =  new FormData(e.target)

            $.ajax({
                method: 'POST',
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                beforeSend: () => {
                    $(this).find('#loading').removeClass('hidden')
                },
                success: (response) => {
                    $(this).find('#loading').addClass('hidden')

                    if ( response?.status ) {
                        window.location.href = response?.redirect_url
                    } else {
                        if ( response?.errors ) {
                            Object.keys(response.errors).map((value) => {
                                $(`.${value}-input`).removeClass('input-success')
                                $(`.${value}-input`).addClass('input-error')
                                $(`.${value}-error`).removeClass('hidden')
                                $(`.${value}-error`).text(response.errors[value])
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response?.error ? response.error : 'Username atau password salah!',
                                timer: 2000
                            })
                        }
                    }
                },
                error: () => {
                    $(this).find('#loading').addClass('hidden')
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: "Something wen't wrong!",
                        timer: 2000
                    })
                }
            })
        })
    })
</script>
<?= $this->endSection(); ?>