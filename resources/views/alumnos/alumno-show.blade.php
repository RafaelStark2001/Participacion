<x-layouts.app :title="__('Info Alumno')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">

            <h1>{{ $alumno->nombre }}</h1>

            <ul>
                <li>Correo: {{ $alumno->correo }}</li>
                <li>Código: {{ $alumno->codigo }}</li>
            </ul>
            <hr>

            <h2>Materias a las que está inscrito</h2>
            <ul>
                @foreach ($alumno->secciones as $seccion)
                    <li>{{ $seccion->nombre }} - {{ $seccion->seccion }}</li>
                @endforeach
            </ul>

            <hr>
            <h2>Inscribir a Sección</h2>
            <form action="{{ route('alumno.actualizar-secciones', $alumno) }}" method="POST">
                @csrf
                <select name="seccion_id[]" id="seccion_id" multiple>
                    @foreach ($secciones as $seccion)
                        <option value="{{ $seccion->id }}" @selected(array_search($seccion->id, $alumno->secciones->pluck('id')->toArray()) !== false)>
                            {{ $seccion->nombre }} - {{ $seccion->seccion }}</option>
                    @endforeach
                </select>
                <br>
                {{-- <input type="hidden" name="alumno_id" value="{{ $alumno->id }}"> --}}
                <button type="submit" class="btn btn-primary">Inscribir</button>

            </form>

        </div>
    </div>
</x-layouts.app>
