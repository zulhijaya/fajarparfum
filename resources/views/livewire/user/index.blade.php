<div>
    <div class="bg-white lg:rounded-xl p-4 lg:p-8 mb-2 lg:mb-4">
        <div class="section-title">Admin, Owner & Manager</div>
        <div class="w-full overflow-x-auto lg:overflow-hidden">
            <table>
                <thead>
                    <tr>
                        <td class="thead-td-left">
                            <div class="flex items-center space-x-1 lg:space-x-2">
                                <div>No</div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </td>
                        <td class="thead-td w-full">
                            <div class="flex items-center space-x-1 lg:space-x-2">
                                <div>Nama</div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </td>
                        <td class="hidden lg:table-cell thead-td truncate">
                            <div class="flex items-center space-x-1 lg:space-x-2">
                                <div>Nomor Telepon</div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </td>
                        <td class="thead-td truncate">
                            <div class="flex items-center space-x-1 lg:space-x-2">
                                <div>Role</div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </td>
                        <td class="thead-td-right">
                            <div class="flex items-center space-x-1 lg:space-x-2">
                                <div>Pilihan</div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $users as $user )
                    <tr>
                        <td class="tbody-td-left">{{ $loop->iteration }}.</td>
                        <td class="tbody-td truncate">{{ $user->name }}</td>
                        <td class="tbody-td hidden lg:table-cell">{{ $user->phone }}</td>
                        <td class="tbody-td capitalize">{{ $user->role }}</td>
                        <td class="tbody-td-right">
                            <x-option :first="$loop->first" :parameter="$user->id">   
                                <x-option-link route="user.edit" :routedata="$user" text="Edit">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </x-option-link>
                                <x-option-link route="user.edit" :routedata="$user" text="Selengkapnya">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                                </x-option-link>
                                <x-option-link route="user.edit" :routedata="$user" text="Absensi">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </x-option-link>
                            </x-option>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="bg-white lg:rounded-xl p-4 lg:p-8">
        <div class="section-title">Karyawan</div>
        <div class="w-full overflow-x-auto lg:overflow-hidden">
            <table class="w-full table-auto">
                <thead>
                    <tr class="font-bold text-sm text-gray-500">
                        <td class="thead-td-left">
                            <div class="flex items-center space-x-1 lg:space-x-2">
                                <div>No</div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </td>
                        <td class="thead-td w-full">
                            <div class="flex items-center space-x-1 lg:space-x-2">
                                <div>Nama</div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </td>
                        <td class="thead-td hidden lg:table-cell truncate">
                            <div class="flex items-center space-x-1 lg:space-x-2">
                                <div>Nomor Telepon</div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </td>
                        <td class="thead-td hidden lg:table-cell truncate">
                            <div class="flex items-center space-x-1 lg:space-x-2">
                                <div>Tempat Kerja</div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </td>
                        <td class="thead-td">
                            <div class="flex items-center space-x-1 lg:space-x-2">
                                <div>Status</div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </td>
                        <td class="thead-td-right">
                            <div class="flex items-center space-x-1 lg:space-x-2">
                                <div>Pilihan</div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $employees as $employee )
                    <tr>
                        <td class="tbody-td-left">{{ $loop->iteration }}.</td>
                        <td class="tbody-td truncate">{{ $employee->name }}</td>
                        <td class="tbody-td hidden lg:table-cell">{{ $employee->phone }}</td>
                        <td class="tbody-td hidden lg:table-cell truncate">{{ $employee->outlets->implode('name', ', ') }}</td>
                        <td class="tbody-td capitalize">
                            @if( $employee->status == 'bekerja' )
                            <div class="bg-green-50 flex items-center justify-center px-3 py-1.5 rounded-full">
                                <div class="text-green-500">{{ $employee->status }}</div>
                            </div>
                            @else
                            <div class="bg-red-50 flex items-center justify-center px-3 py-1.5 rounded-full">
                                <div class="text-red-500">{{ $employee->status }}</div>
                            </div>
                            @endif
                        </td>
                        <td class="tbody-td-right">
                            <x-option :first="$loop->first" :parameter="$employee->id">   
                                <x-option-link route="user.edit" :routedata="$employee" text="Edit">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </x-option-link>
                                <x-option-link route="user.edit" :routedata="$employee" text="Selengkapnya">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                                </x-option-link>
                                <x-option-link route="user.edit" :routedata="$employee" text="Absensi">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </x-option-link>
                            </x-option>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>