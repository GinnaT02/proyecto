<div id="formularioMascotas" class="dashboard">
    <center>
        <h3>Registrar Mascota</h3>

        {{-- Nombre --}}
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        {{-- Edad --}}
        <label for="edad">Edad:</label><br>
        <input type="number" id="edad" name="edad"><br><br>

        {{-- Vacunado --}}
        <label for="vacunado">¿Vacunado?</label><br>
        <select id="vacunado" name="vacunado" required>
            <option value="1">Sí</option>
            <option value="0">No</option>
        </select><br><br>

        {{-- Peligroso --}}
        <label for="peligroso">¿Es peligroso?</label><br>
        <select id="peligroso" name="peligroso" required>
            <option value="1">Sí</option>
            <option value="0">No</option>
        </select><br><br>

        {{-- Esterilizado --}}
        <label for="esterilizado">¿Esterilizado?</label><br>
        <select id="esterilizado" name="esterilizado" required>
            <option value="1">Sí</option>
            <option value="0">No</option>
        </select><br><br>

        {{-- Género --}}
        <label for="genero">Género:</label><br>
        <select id="genero" name="genero" required>
            <option value="Macho">Macho</option>
            <option value="Hembra">Hembra</option>
        </select><br><br>

        {{-- Raza --}}
        <label for="raza_id">Raza:</label><br>
        <select id="raza_id" name="raza_id" required>
            <option value="" disabled selected>-- Selecciona una raza --</option>

            @foreach ($razas as $raza)
                <option value="{{ $raza->id_raza}}">{{ $raza->nombre }}</option>
            @endforeach
        </select><br><br>

        {{-- Condición --}}
        <label for="condicion_id">Condición:</label><br>
        <select id="condicion_id" name="condicion_id" required>
             <option value="" disabled selected>-- Selecciona una condicion --</option>
            @foreach ($condiciones as $condicion)
                <option value="{{ $condicion->id_condicion }}">{{ $condicion->descripcion }}</option>
            @endforeach
        </select><br><br>

        {{-- Fecha de ingreso --}}
        <label for="fecha_ingreso">Fecha de ingreso:</label><br>
        <input type="date" id="fecha_ingreso" name="fecha_ingreso"><br><br>

        {{-- Condiciones especiales --}}
        <label for="condiciones_especiales">Condiciones especiales:</label><br>
        <textarea id="condiciones_especiales" name="condiciones_especiales"></textarea><br><br>

        {{-- Estado --}}
        <label for="estado_id">Estado:</label><br>
        <select id="estado_id" name="estado_id" required>
             <option value="" disabled selected>-- Selecciona un estado --</option>
            @foreach ($estados as $estado)
                <option value="{{ $estado->id_estado}}">{{ $estado->nombre }}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Guardar</button>
    </center>
</div>
