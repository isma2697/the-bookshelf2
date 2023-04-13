<div class="create-user">
    <form action="{{route('admin.users.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" aria-describedby="helpId" value="{{old('name')}}">
            @error('name')
                <div><strong>{{$message}}</strong></div>
            @enderror
        </div>
        <div class="form-group">
            <label for="surname">Apellido</label>
            <input type="text" name="surname" id="surname" class="form-control" placeholder="Apellido" aria-describedby="helpId" value="{{old('surname')}}">
            @error('surname')
                <div class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="dni">DNI</label>
            <input type="text" name="dni" id="dni" class="form-control" placeholder="DNI" aria-describedby="helpId" value="{{old('dni')}}">
            @error('dni')
                <div class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone">Telefono</label>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Telefono" aria-describedby="helpId" value="{{old('phone')}}">
            @error('phone')
                <div class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="Email" aria-describedby="helpId" value="{{old('email')}}">
            @error('email')
                <div class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" aria-describedby="helpId">
            @error('password')
                <div class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirmar contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirmar contraseña" aria-describedby="helpId">
            @error('password_confirmation')
                <div class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="is_admin">Admin</label>
            <input type="checkbox" name="is_admin" id="is_admin" class="form-control" placeholder="Admin" aria-describedby="helpId">
        </div>
        <button type="submit" class="btn btn-primary">Crear usuario</button>
        <a href="{{route('admin.users.index')}}" class="btn btn-danger">Cancelar</a>
    </form>
</div>