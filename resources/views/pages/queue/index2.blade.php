<tr>
                    <th scope="col" class="px-6 py-3 font-semibold text-gray-600 border-r border-gray-100"
                        style="font-size: 0.81rem">No. Antrian</th>
                    <th scope="col" class="px-6 py-3 font-semibold text-gray-600 border-r border-gray-100"
                        style="font-size: 0.81rem">No. RM</th>
                    <th scope="col" class="px-6 py-3 font-semibold text-gray-600 border-r border-gray-100"
                        style="font-size: 0.81rem">Pasien</th>
                    <th scope="col" class="px-6 py-3 font-semibold text-gray-600 border-r border-gray-100"
                        style="font-size: 0.81rem">Owner Pasien</th>
                    <th scope="col" class="px-6 py-3 font-semibold text-gray-600 border-r border-gray-100"
                        style="font-size: 0.81rem">No. Telp</th>
                    @if (auth()->user()->role != 'doctor')
                        <th scope="col" class="px-6 py-3 font-semibold text-gray-600 border-r border-gray-100"
                            style="font-size: 0.81rem">Status</th>
                        <th scope="col" class="px-6 py-3 font-semibold text-gray-600 border-r border-gray-100"
                            style="font-size: 0.81rem">Dokter</th>
                    @endif
                    <th scope="col" class="px-6 py-3 font-semibold text-gray-600 border-r border-gray-100 text-center"
                        style="font-size: 0.81rem">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-2 font-semibold border-r border-gray-100 text-center">1</td>
                    <td class="px-6 py-2 font-semibold text-center border-r border-gray-100">RM-1</td>
                    <td class="px-6 py-2 font-semibold border-r border-gray-100">
                        <div>
                            <p class="font-bold">Kimo</a>
                            <p style="font-size: 0.81rem">Kucing</p>
                        </div>
                    </td>
                    <td class="px-6 py-2 font-semibold border-r border-gray-100">Hendra</td>
                    <td class="px-6 py-2 font-semibold border-r border-gray-100">085532127698</td>
                    @if (auth()->user()->role != 'doctor')
                        <td class="px-6 py-2 font-semibold border-r border-gray-100">
                            <x-icons.checking />
                        </td>
                        <td class="px-6 py-2 font-semibold border-r border-gray-100">Agus</td>
                    @endif
                    <td class="justify-center py-2 text-center border-r border-gray-100 flex">
                        @if (auth()->user()->role == 'doctor')
                            <x-icons.stethoscope2 />
                        @endif
                        <x-icons.view />
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-2 font-semibold border-r border-gray-100 text-center">3</td>
                    <td class="px-6 py-2 font-semibold text-center border-r border-gray-100">RM-9</td>
                    <td class="px-6 py-2 font-semibold border-r border-gray-100">
                        <div>
                            <p class="font-bold">Yunus</a>
                            <p style="font-size: 0.81rem">Kera</p>
                        </div>
                    </td>
                    <td class="px-6 py-2 font-semibold border-r border-gray-100">Heru</td>
                    <td class="px-6 py-2 font-semibold border-r border-gray-100">085532127698</td>
                    @if (auth()->user()->role != 'doctor')
                        <td class="px-6 py-2 font-semibold border-r border-gray-100">
                            <x-icons.waiting />
                        </td>
                        <td class="px-6 py-2 font-semibold border-r border-gray-100">Yudha</td>
                    @endif
                    <td class="justify-center py-2 text-center border-r border-gray-100 flex">
                        @if (auth()->user()->role == 'admin')
                            <x-icons.redcancel />
                        @endif
                        @if (auth()->user()->role == 'doctor')
                            <x-icons.stethoscope2 />
                        @endif
                        <x-icons.view />
                    </td>
                </tr>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-2 font-semibold border-r border-gray-100 text-center">2</td>
                    <td class="px-6 py-2 font-semibold text-center border-r border-gray-100">RM-5</td>
                    <td class="px-6 py-2 font-semibold border-r border-gray-100">
                        <div>
                            <p class="font-bold">Blacky</a>
                            <p style="font-size: 0.81rem">Anjing</p>
                        </div>
                    </td>
                    <td class="px-6 py-2 font-semibold border-r border-gray-100">Hendra</td>
                    <td class="px-6 py-2 font-semibold border-r border-gray-100">085532127698</td>
                    @if (auth()->user()->role != 'doctor')
                        <td class="px-6 py-2 font-semibold border-r border-gray-100">
                            <x-icons.waiting />
                        </td>
                        <td class="px-6 py-2 font-semibold border-r border-gray-100">Yudi</td>
                    @endif
                    <td class="justify-center py-2 text-center border-r border-gray-100 flex">
                        @if (auth()->user()->role == 'admin')
                            <x-icons.redcancel />
                        @endif
                        @if (auth()->user()->role == 'doctor')
                            <x-icons.stethoscope2 />
                        @endif
                        <x-icons.view />
                    </td>
                </tr>
            </tbody>
