<?= $this->extend('layouts/auth'); ?>
<?= $this->section('content'); ?>

    <form id="form" method="post" class="mt-6">
        <div>
            <div class="w-full flex-between-center gap-2">
                <div class="w-1/2">
                    <label for="role-peternak" class="cursor-pointer">
                        <input type="radio" name="role" id="role-peternak" class="peer" value="2" checked hidden>
                        <div class="w-full border-[1px] border-primary text-primary text-center py-1.5 rounded-md transition ease-in-out peer-checked:bg-primary peer-checked:text-light">Peternak</div>
                    </label>
                </div>
                <div class="w-1/2">
                    <label for="role-petugas" class="cursor-pointer">
                        <input type="radio" name="role" id="role-petugas" class="peer" value="3" hidden>
                        <div class="w-full border-[1px] border-primary text-primary text-center py-1.5 rounded-md transition ease-in-out peer-checked:bg-primary peer-checked:text-light">Petugas</div>
                    </label>
                </div>
            </div>
            <span class="role-error text-xs text-red-500 hidden"></span>
        </div>

        <div class="mt-4">
            <div class="flex-items relative">
                <label for="nama_lengkap" class="absolute left-3">
                    <img src="/assets/icons/user.svg" alt="Nama Lengkap" class="size-5">
                </label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" autocomplete="off" class="nama_lengkap-input input-success w-full px-4 pl-10 py-2 rounded-md placeholder-primary">
            </div>
            <span class="nama_lengkap-error text-xs text-red-500 hidden"></span>
        </div>

        <div class="dynamic-role hidden">
            <div class="mt-4">
                <div class="flex-items relative">
                    <label for="kecamatan" class="absolute left-3">
                        <img src="/assets/icons/map.svg" alt="kecamatan" class="size-5">
                    </label>
                    <select name="kecamatan" id="kecamatan" placeholder="Kecamatan" autocomplete="off" class="kecamatan-input input-success w-full px-4 pl-10 py-2 rounded-md placeholder-primary">
                        <option disabled selected>Pilih Kecamatan</option>
                        <?php foreach($kecamatan as $row) { ?>
                            <option value="<?= $row['nama_kecamatan']; ?>"><?= $row['nama_kecamatan']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <span class="kecamatan-error text-xs text-red-500 hidden"></span>
            </div>

            <div class="mt-4">
                <div class="flex-items relative">
                    <label for="desa_binaan" class="absolute left-3">
                        <img src="/assets/icons/map.svg" alt="desa_binaan" class="size-5">
                    </label>
                    <input type="text" name="desa_binaan" id="desa_binaan" placeholder="Desa Binaan" autocomplete="off" class="desa_binaan-input input-success w-full px-4 pl-10 py-2 rounded-md placeholder-primary">
                </div>
                <span class="desa_binaan-error text-xs text-red-500 hidden"></span>
            </div>
        </div>

        <div class="alamat-card mt-4 hidden">
            <div class="flex-items relative">
                <label for="alamat" class="absolute left-3">
                    <img src="/assets/icons/map.svg" alt="Alamat" class="size-5">
                </label>
                <input type="text" name="alamat" id="alamat" placeholder="Alamat" autocomplete="off" class="alamat-input input-success w-full px-4 pl-10 py-2 rounded-md placeholder-primary">
            </div>
            <span class="alamat-error text-xs text-red-500 hidden"></span>
        </div>

        <div class="mt-4">
            <div class="flex-items relative">
                <label for="no_wa" class="absolute left-3">
                    <img src="/assets/icons/phone.svg" alt="No. WhatsApp" class="size-5">
                </label>
                <input type="text" name="no_wa" id="no_wa" inputmode="numeric" placeholder="No. WhatsApp" autocomplete="off" class="no_wa-input input-success w-full px-4 pl-10 py-2 rounded-md placeholder-primary">
            </div>
            <span class="no_wa-error text-xs text-red-500 hidden"></span>
        </div>

        <div class="dynamic-role hidden">
            <div class="mt-4">
                <div class="flex-items relative">
                    <label for="no_registrasi" class="absolute left-3">
                        <img src="/assets/icons/idcard.svg" alt="No. WhatsApp" class="size-5">
                    </label>
                    <input type="text" name="no_registrasi" id="no_registrasi" inputmode="numeric" placeholder="No. Registrasi" autocomplete="off" class="no_registrasi-input input-success w-full px-4 pl-10 py-2 rounded-md placeholder-primary">
                </div>
                <span class="no_registrasi-error text-xs text-red-500 hidden"></span>
            </div>
        </div>

        <div class="mt-4">
            <div class="flex-items relative">
                <label for="password" class="absolute left-3">
                    <img src="/assets/icons/key.svg" alt="Password" class="size-5">
                </label>
                <input type="password" name="password" id="password" placeholder="Kata Sandi" autocomplete="off" class="validatePassword password-input input-success w-full px-4 pl-10 py-2 rounded-md placeholder-primary">
                <button type="button" class="toggle-password absolute right-3" data-input="#password">
                    <img src="/assets/icons/eye.svg" class="size-5">
                </button>
            </div>
            <span class="password-error text-xs text-red-500 hidden"></span>
            <div>
                <span class="passwordError text-xs text-red-500 hidden">Kata sandi minimal 8 karakter yang terdiri dari kombinasi huruf besar dan huruf kecil serta angka.</span>
            </div>
        </div>

        <div class="mt-4">
            <div class="flex-items relative">
                <label for="confirmPassword" class="absolute left-3">
                    <img src="/assets/icons/key.svg" alt="Konfirmasi Password" class="size-5">
                </label>
                <input type="password" name="confirm_password" id="confirmPassword" placeholder="Konfirmasi Kata Sandi" autocomplete="off" class="w-full input-success px-4 pl-10 py-2 rounded-md placeholder-primary">
                <button type="button" class="toggle-password absolute right-3" data-input="#confirmPassword">
                    <img src="/assets/icons/eye.svg" class="size-5">
                </button>
            </div>
            <span class="confirmError text-xs text-red-500 hidden">Konfirmasi password tidak sama dengan password</span>
        </div>

        <div class="mt-6 w-full flex-justify">
            <button type="submit" class="submit-btn flex-center button px-8 py-2.5 rounded-full">
                <?= $this->include('components/loading/button'); ?>
                <span>Daftar Akun</span>
            </button>
        </div>

        <div class="mt-6">
            <p class="text-xs text-center">Sudah memiliki akun? <a href="/login" class="link-underline text-success font-medium">Masuk disini</a></p>
        </div>
    </form>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="/assets/js/password.js"></script>
<script>
    $(function() {
        $('input[name=role]').on('click', function() {
            if ( Number($(this).val()) === 3 ) {
                $('.alamat-card').hide()
                $('.dynamic-role').each(function() {
                    $(this).show()
                })
            } else {
                $('.alamat-card').show()
                $('.dynamic-role').each(function() {
                    $(this).hide()
                })
            }
        })

        $('#form').on('submit', function(e) {
            e.preventDefault()
            const formData = new FormData(e.target)

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
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Pendaftaran berhasil!',
                            timer: 2000
                        }).then(() => {
                            window.location.href = '/login'
                        })
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