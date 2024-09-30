// Ambil elemen tombol dan dropdown
const filterButton = document.getElementById('filter');
const filterDropdown = document.getElementById('filter-dropdown');

// Tampilkan/sembunyikan dropdown filter ketika tombol "Filter" diklik
filterButton.addEventListener('click', () => {
    const rect = filterButton.getBoundingClientRect(); // Dapatkan posisi dan ukuran tombol filter

    // Atur posisi dropdown tepat di bawah tombol
    filterDropdown.style.top = `${rect.bottom + window.scrollY}px`;
    filterDropdown.style.left = `${rect.left}px`;
    
    // Sesuaikan lebar dropdown dengan lebar tombol filter
    filterDropdown.style.width = `${rect.width}px`;

    // Tampilkan/sembunyikan dropdown
    filterDropdown.classList.toggle('hidden');
});
