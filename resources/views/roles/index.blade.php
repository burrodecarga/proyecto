<x-app-layout>
    <div class="text-center mx-auto">

        <a href="{{ route('roles.create') }}" title="{{ _('add role') }}" >
            <i class="icono azul text-center my-5 fas fa-plus-square"></i>
        </a>
    </div>
    <x-marco class="max-w-3xl">

            <x-slot name="titulo">{{ __('list of roles') }} </x-slot>

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
                            <a href="{{ route('roles.show', $role->id) }}">
                            <i class="icono azul fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ route('roles.edit', $role->id) }}">
                                <i class="icono verde fa-solid fa-pen-to-square"></i>
                            </a>
                            <form class="formulario" action="{{ route('roles.destroy',$role->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="icono rojo fa-solid fa-trash-can" title="{{ _('delete role') }}"></i>
                                </button>
                            </form>
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
                    "language":{
             "info": "_PAGE_ de _PAGES_ de _TOTAL_ ",
               "search":"Buscar  ",
               "paginate":{
                   "next":"Siguiente",
                   "previous":"Anterior",
                   "last":"Último",
                   "first":"Primero",
               },
               "lengthMenu":"Mostrar  <select class='custom-select custom-select-sm'>"+
                             "<option value='5'>5</option>"+
                             "<option value='10'>10</option>"+
                             "<option value='15'>15</option>"+
                             "<option value='20'>20</option>"+
                             "<option value='25'>25</option>"+
                             "<option value='50'>50</option>"+
                             "<option value='100'>100</option>"+
                             "<option value='-1'>Todos</option>"+
                             "</select> Registros",
               "loadingRecord":"Cargando....",
               "processing":"Procesando...",
               "emptyTable":"No hay Registros",
               "zeroRecords":"No hay coincidencias",
               "infoEmpty":"",
               "infoFiltered":""
           },
                    "columnDefs": [{
                        "targets": [1],
                        "orderable": false
                    }],

                });

            });
        </script>
        <script>
         let forms = document.querySelectorAll('.formulario')
         forms.forEach(form => {
            form.addEventListener('submit',(event)=>{
                if(confirm('Desea Eliminar Registro')){
                    return true
                }
                event.preventDefault()
            })

         });
        </script>

    @endpush
</x-app-layout>
