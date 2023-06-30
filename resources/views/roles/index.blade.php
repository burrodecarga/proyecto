<x-app-layout>
    <x-marco class="max-w-3xl">
        <x-slot name="titulo">{{ __('list of roles') }}</x-slot>

        <table id="roles" class="stripe" style="width:100%">
            <thead>
                <tr>
                    <th width="75%">{{ __('role') }}</th>
                    <th width="25%">{{ __('actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td >{{ $role->name }}</td>
                        <td  class="flex justify-between">
                            <i class="icono azul fa-solid fa-eye"></i>
                            <i class="icono verde fa-solid fa-pen-to-square"></i>
                            <i class="icono rojo fa-solid fa-trash-can"></i>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-marco>
    @push('script')
        <script>
            $(document).ready(function() {
                $('#roles').DataTable({
                    "columnDefs": [{
                        "targets": [1],
                        "orderable": false
                    }]
                });
            });
        </script>
    @endpush
</x-app-layout>
