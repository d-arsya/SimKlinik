<!-- Search Icon -->
<div class="relative w-full max-w-xs">
    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Cari..."
        class="w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 ">
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

<!-- Search -->
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
