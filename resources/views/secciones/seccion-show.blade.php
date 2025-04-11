<x-layouts.app :title="__('Info Seccion')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">

            <h1>{{ $seccion->nombre }} - {{ $seccion->seccion }}</h1>

            <ul>
                <li>Docente: {{ $seccion->docente->nombre }}</li>
                <li>NRC: {{ $seccion->nrc }}</li>
            </ul>
            <hr>

            <h2>Alumnos inscritos</h2>
            <ul>
                @foreach ($seccion->alumnos as $alumno)
                    <li>{{ $alumno->nombre }} - {{ $alumno->codigo }}</li>
                @endforeach
            </ul>

            <hr>
            <h2>Inscribir a Alumno</h2>
            <form action="{{ route('seccion.actualizar-alumnos', $seccion) }}" method="POST">
                @csrf
                <select name="alumno_id[]" id="alumno_id" multiple>
                    @foreach ($alumnos as $alumno)
                        <option value="{{ $alumno->id }}" @selected(array_search($alumno->id, $seccion->alumnos->pluck('id')->toArray()) !== false)>
                            {{ $alumno->nombre }} - {{ $alumno->codigo }}</option>
                    @endforeach
                </select>
                <br>
                {{-- <input type="hidden" name="alumno_id" value="{{ $alumno->id }}"> --}}
                <button type="submit" class="btn btn-primary">Inscribir</button>

            </form>

        </div>
    </div>
</x-layouts.app>
