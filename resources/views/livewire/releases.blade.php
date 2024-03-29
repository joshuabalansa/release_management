<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <button type="button" data-modal-target="default-modal" data-modal-toggle="default-modal"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create
            a Task</button>

        <form class="max-w-lg mx-auto mb-5">
            <div class="flex">
                <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your
                    Email</label>
                    <div class="relative">
                            <label for="environment" class="sr-only">Site</label>
                            <select id="environment"  wire:model.live="search"
                                    class="block w-full py-2.5 pl-4 pr-10 text-sm font-medium text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg focus:outline-none focus:ring-4 focus:border-gray-100 dark:bg-gray-700 dark:border-gray-600 dark:focus:border-gray-700 dark:text-white">
                                <option value="all">All Site</option>
                                <option value="development">Development</option>
                                <option value="staging">Staging</option>
                                <option value="production">Production</option>
                                <option value="archived">Archived</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>

                <div class="relative w-full mr-5 flex">
                    <input type="search" wire:model.live="search" id="search-dropdown"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                        placeholder="Search title, site, developer, product owner.." required />


                </div>
                <div role="status mt-5" wire:loading="search">
                    <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="currentColor" />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentFill" />
                    </svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </form>

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Card Title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Developer
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Development
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Staging
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Production
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Site
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Options
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($this->releases as $release)
                            <tr wire:transition
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $release->getTitle() }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $release->getDeveloper() }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $release->getTestedOn('development') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $release->getTestedOn('staging') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $release->getTestedOn('production') }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $release->site }}
                                </td>
                                <td class="px-6 py-4">
                                <span class="bg-{{ $release->status === 'Approved' ? 'green' : 'red' }}-100 text-{{ $release->status === 'Approved' ? 'green' : 'red' }}-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-{{ $release->status === 'Approved' ? 'green' : 'red' }}-900 dark:text-{{ $release->status === 'Approved' ? 'green' : 'red' }}-300">
                                    {{ $release->status }}
                                </span>

                                </td>
                                <td class="px-6 py-4">
                                <a href="#" wire:click.prevent="setStatus({{ $release->id }})" wire:confirm="Are you sure you want to Approve this?"
                                    wire:loading.attr="disabled"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Approve</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- Modal --}}
    <livewire:components.modal />
</div>
