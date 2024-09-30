<div class="p-6 border-[1px] border-primary rounded-xl relative overflow-hidden">
    <div class="absolute top-0 right-0 p-3 pl-6 pb-6 rounded-bl-full bg-primary">
        <a href="/peternak/profil/edit">
            <img src="/assets/icons/pencil.svg" class="size-5">
        </a>
    </div>

    <div>
        <h1 class="text-2xl font-medium">Profil</h1>
        <div class="mt-3 w-64 h-[1px] bg-success"></div>
    </div>

    <div class="w-full mt-4 flex-items gap-5">
        <div class="flex-center">
            <div class="size-24">
                <img src="/assets/images/<?= $user['foto'] ? 'user/' . $user['foto'] : 'dummy/profil.png'; ?>" alt="" class="w-full h-full rounded-full object-cover object-center border-[1px] border-success">
            </div>
        </div>

        <div class="w-full">
            <div class="w-full border-[1px] border-success rounded-md px-6 py-1">
                <h1 class="font-normal text-xs"><?= $user['nama'] ?? '-'; ?></h1>
            </div>
            <div class="mt-4 w-full border-[1px] border-success rounded-md px-6 py-1">
                <h1 class="font-normal text-xs"><?= $user['alamat'] ? $user['alamat'] : '-'; ?></h1>
            </div>
            <div class="mt-4 w-full border-[1px] border-success rounded-md px-6 py-1">
                <h1 class="font-normal text-xs"><?= $user['no_wa'] ?? '-'; ?></h1>
            </div>
        </div>
    </div>
</div>