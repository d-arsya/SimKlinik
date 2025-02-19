@props(['table'])
<div class="border shadow-md sm:rounded-lg">
    <!-- Search -->
    <div class="flex items-center justify-between py-3 p-[27.5px] border-b">
        <!-- Pencarian -->
        <div class="relative w-full max-w-xs">
            <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Cari..."
                class="w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.1"
                        d="M13.6999 7.43294C13.6999 10.6546 11.0882 13.2663 7.86654 13.2663C4.64488 13.2663 2.0332 10.6546 2.0332 7.43294C2.0332 4.21128 4.64488 1.59961 7.86654 1.59961C11.0882 1.59961 13.6999 4.21128 13.6999 7.43294Z"
                        fill="#99A1B7" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M12.5054 11.2039C13.3645 10.1658 13.8809 8.83365 13.8809 7.38086C13.8809 4.06715 11.1946 1.38086 7.88086 1.38086C4.56715 1.38086 1.88086 4.06715 1.88086 7.38086C1.88086 10.6946 4.56715 13.3809 7.88086 13.3809C9.33367 13.3809 10.6659 12.8645 11.704 12.0053L14.1468 14.4482C14.3681 14.6695 14.7269 14.6695 14.9482 14.4482C15.1695 14.2269 15.1695 13.8681 14.9482 13.6468L12.5054 11.2039ZM7.88086 12.2688C5.1813 12.2688 2.99288 10.0804 2.99288 7.38086C2.99288 4.6813 5.1813 2.49288 7.88086 2.49288C10.5804 2.49288 12.7688 4.6813 12.7688 7.38086C12.7688 10.0804 10.5804 12.2688 7.88086 12.2688Z"
                        fill="#99A1B7" />
                </svg>
            </div>
        </div>

        <!-- Filter -->
        <div class="relative inline-block">
            <!-- Tombol yang diklik -->
            <button id="filterButton" onclick="toggleDropdown()"
                class="flex items-center border border-[#E9F3FF] bg-[#EFF6FF] text-[#1B84FF] px-5 h-[44px] text-xs font-medium self-center rounded-md">
                <svg class="pe-1" width="20" height="19" viewBox="0 0 20 19" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M4.45898 2.375H15.5423L7.47998 10.4373C7.34994 10.1037 7.13815 9.80805 6.86407 9.57758C6.68357 9.42083 6.43103 9.27913 5.92753 8.99492L3.6214 7.69658C2.87011 7.27462 2.49486 7.06325 2.28982 6.72283C2.08398 6.38162 2.08398 5.96996 2.08398 5.14821V4.60196C2.08398 3.55221 2.08398 3.02654 2.43232 2.70037C2.77907 2.375 3.33878 2.375 4.45898 2.375Z"
                        fill="#1B84FF" />
                    <path opacity="0.5"
                        d="M17.9166 5.149V4.60275C17.9166 3.553 17.9166 3.02733 17.5683 2.70117C17.2216 2.375 16.6618 2.375 15.5416 2.375L7.47852 10.4373C7.5181 10.5392 7.55003 10.6455 7.57431 10.7564C7.62497 10.982 7.62497 11.2464 7.62497 11.7745V13.8882C7.62497 14.6078 7.62497 14.968 7.82447 15.2483C8.02397 15.5293 8.37864 15.6679 9.08639 15.945C10.5739 16.526 11.3173 16.8166 11.8461 16.4857C12.375 16.1547 12.375 15.3995 12.375 13.8874V11.7737C12.375 11.2464 12.375 10.982 12.4248 10.7564C12.5245 10.2949 12.7752 9.87975 13.1373 9.57679C13.3171 9.42083 13.5688 9.27913 14.0731 8.99492L16.3792 7.69658C17.1297 7.27463 17.5058 7.06325 17.7108 6.72283C17.9166 6.38242 17.9166 5.97075 17.9166 5.149Z"
                        fill="#1B84FF" />
                </svg>
                <span id="filterText">Filters</span>
            </button>
            <div id="dropdown"
                class="absolute right-0 z-10 hidden w-48 mt-2 bg-white border border-gray-200 rounded-lg shadow-lg">
                <ul id="dropdownOptions" class="py-2 text-sm text-gray-700">
                    <li><button onclick="selectOption('Today')"
                            class="block w-full px-4 py-2 text-left hover:bg-gray-100">Today</button></li>
                    <li><button onclick="selectOption('Yesterday')"
                            class="block w-full px-4 py-2 text-left hover:bg-gray-100">Yesterday</button></li>
                    <li><button onclick="selectOption('7 Hari yang Lalu')"
                            class="block w-full px-4 py-2 text-left hover:bg-gray-100">7 Hari yang Lalu</button>
                    </li>
                    <li><button onclick="selectOption('Bulan Lalu')"
                            class="block w-full px-4 py-2 text-left hover:bg-gray-100">Bulan Lalu</button></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Tabel Antrian -->
    <div class=" place-items-center">
        <table class="w-full text-left rtl:text-right mx-10">
            {{ $slot }}
        </table>
    </div>

    <!-- Pagination with Rows Per Page Selector -->
    <div class="flex items-center justify-between py-4 px-4 text-sm text-gray-700">
        <!-- Rows Per Page Selector -->
        <select id="rowsPerPage" onchange="changeRowsPerPage()"
            class="p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-klinikBlue focus:border-klinikBlue">
            <option value="10" selected>10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
    </div>
</div>

<script>
    function changeRowsPerPage() {
        const rows = document.getElementById("rowsPerPage").value;
        const url = new URL(window.location.href);
        url.searchParams.set('rows', rows);
        window.location.href = url.toString(); // Redirect ke URL dengan parameter baru
    }

    // Menjaga pilihan tetap terlihat setelah halaman di-reload
    window.onload = function() {
        const urlParams = new URLSearchParams(window.location.search);
        const rowsParam = urlParams.get('rows');
        if (rowsParam) {
            document.getElementById("rowsPerPage").value = rowsParam;
        }
    };
</script>

<!-- JavaScript untuk Fitur Pencarian -->
<script>
    function searchTable() {
        const input = document.getElementById("searchInput").value.toLowerCase();
        const table = document.getElementById("dataTable");
        const tr = table.getElementsByTagName("tr");

        for (let i = 1; i < tr.length; i++) {
            const tdArray = tr[i].getElementsByTagName("td");
            let found = false;

            for (let j = 0; j < tdArray.length; j++) {
                if (tdArray[j] && tdArray[j].textContent.toLowerCase().includes(input)) {
                    found = true;
                    break;
                }
            }
            tr[i].style.display = found ? "" : "none";
        }
    }
</script>

<!-- Tampilan Filter -->
<script>
    let currentOption = null;

    function toggleDropdown() {
        const dropdown = document.getElementById('dropdown');
        dropdown.classList.toggle('hidden');
    }

    function selectOption(optionText) {
        currentOption = optionText;
        const filterText = document.getElementById('filterText');
        filterText.textContent = optionText;

        updateDropdownOptions();
        const dropdown = document.getElementById('dropdown');
        dropdown.classList.add('hidden');
    }

    function updateDropdownOptions() {
        const options = ['Today', 'Yesterday', '7 Hari yang Lalu', 'Bulan Lalu'];
        const dropdownOptions = document.getElementById('dropdownOptions');
        dropdownOptions.innerHTML = '';

        // Masukkan "Hapus Filter" di urutan pertama jika ada opsi yang dipilih
        if (currentOption) {
            dropdownOptions.innerHTML += `
    <li><button onclick="clearFilter()" class="block w-full px-4 py-2 text-left hover:bg-gray-100">Hapus Filter</button></li>
    `;
        }

        // Tambahkan opsi yang lain, kecuali opsi yang dipilih sebelumnya
        options.forEach(option => {
            if (option !== currentOption) {
                dropdownOptions.innerHTML += `
        <li><button onclick="selectOption('${option}')" class="block w-full px-4 py-2 text-left hover:bg-gray-100">${option}</button></li>
        `;
            }
        });
    }

    function clearFilter() {
        currentOption = null;
        const filterText = document.getElementById('filterText');
        filterText.textContent = 'Filters';
        updateDropdownOptions();

        const dropdown = document.getElementById('dropdown');
        dropdown.classList.add('hidden');
    }
</script>
