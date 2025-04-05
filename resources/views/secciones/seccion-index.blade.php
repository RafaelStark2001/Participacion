<x-layouts.app :title="__('Lista Secciones')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">

            <table border="1">
                <tr>
                    <th>Nombre</th>
                    <th>Seccion</th>
                    <th>Docente ID</th>
                    <th>NRC</th>
                    <th>Alumnos</th>
                </tr>

                @foreach ($secciones as $seccion)
                    <tr>
                        <td><a href="{{ route('seccion.show', $seccion) }}">{{ $seccion->nombre }}</a></td>
                        <td>{{ $seccion->seccion }}</td>
                        <td>{{ $seccion->docente_id }}</td>
                        <td>{{ $seccion->nrc }}</td>
                        <td>
                            @foreach ($seccion->alumnos as $alumno)
                                {{ $alumno->nombre }} - {{ $alumno->codigo }}<br>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>
</x-layouts.app>
