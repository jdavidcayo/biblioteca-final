<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">

            <input type="text" name="name" class="form-control" placeholder="NOMBRE">
        </div>
        <div class="form-group">
            <input type="text" name="organizacion" class="form-control" placeholder="ORGANIZACIÓN">
        </div>
        <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="EMAIL">
        </div>
        <div class="form-group">
            @isset($user)
                <input type="hidden" id="pwd" name="password" value="{{ $user->password }}" class="form-control"
                    placeholder="CONTRASEÑA" readonly>
                <button type="text" class="btn btn-outline-primary" id="btnGenerar">GENERAR</button>
            @else
                <input type="text" id="pwd" name="password" class="form-control" placeholder="CONTRASEÑA">
                <button type="button" class="btn btn-outline-primary mt-2" id="btnGenerar">GENERAR</button>
            @endisset

        </div>
        <div class="form-group">
            <select name="rol" id="rolInput" class="form-control">
                <option value="user">USUARIO</option>
                <option value="admin">ADMINISTRADOR</option>
            </select>
        </div>

    </div>
    <div class="box-footer mt20">

        <button type="submit" class="btn btn-primary block">
            {{ isset($user) ? 'Actualizar' : 'Crear' }} Usuario
        </button>
    </div>

    <script>
        let btnGenerar = document.getElementById('btnGenerar');
        let pwd = document.getElementById('pwd');
        const csrfToken = '{{ csrf_token() }}';
        const url = '{{ route('admin.generate-password') }}';


        btnGenerar.addEventListener('click', async () => {
            let res = await fetch(url, {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json'
                },
            })
            console.log(res)
        });
    </script>
</div>
