<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <button type="button" id="openModalButton" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newMovementModal">
                        <i class="fas fa-plus"></i>
                      </button>

                    {{-- <button id="openModalButton" class="text-blue-500 hover:text-blue-700"><i class="fas fa-plus"></i></button> --}}
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($movements as $movement)
                                <tr>
                                    <td class="border px-4 py-2">{{ $movement->name }}</td>
                                    <td class="border px-4 py-2">{{ $movement->description }}</td>
                                    <td class="border px-4 py-2">R$ {{ $movement->amount }}</td>
                                    <td class="border px-4 py-2">{{ $movement->type }}</td>
                                    <td class="border px-4 py-2">{{ $movement->date }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('movements.edit', $movement->id) }}" class="text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('movements.destroy', $movement->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        <p>Average Expenses: R$ {{ number_format($avgExpenses, 2, ',', '.') }}</p>
                        <p>Balance: R$ {{ number_format($balance, 2, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="newMovementModal" tabindex="-1" aria-labelledby="newMovementModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('movements.create', ['categories' => $categories])
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
</x-app-layout>
