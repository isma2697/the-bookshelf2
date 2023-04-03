{{-- <div class="create-user">
    <form action="{{route('admin.users.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="surname">Apellido</label>
            <input type="text" name="surname" id="surname" class="form-control" placeholder="Apellido" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="dni">DNI</label>
            <input type="text" name="dni" id="dni" class="form-control" placeholder="DNI" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="phone">Telefono</label>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Telefono" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="Email" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirmar contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirmar contraseña" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="is_admin">Admin</label>
            <input type="checkbox" name="is_admin" id="is_admin" class="form-control" placeholder="Admin" aria-describedby="helpId">
        </div>
        <button type="submit" class="btn btn-primary">Crear usuario</button>
        <a href="{{route('admin.users.index')}}" class="btn btn-danger">Cancelar</a>
    </form>
</div> --}}

<div class="edit-user">
    <form action="{{route('admin.users.update', $user)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" aria-describedby="helpId" value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label for="surname">Apellido</label>
            <input type="text" name="surname" id="surname" class="form-control" placeholder="Apellido" aria-describedby="helpId" value="{{$user->surname}}">
        </div>
        <div class="form-group">
            <label for="dni">DNI</label>
            <input type="text" name="dni" id="dni" class="form-control" placeholder="DNI" aria-describedby="helpId" value="{{$user->dni}}">
        </div>
        <div class="form-group">
            <label for="phone">Telefono</label>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Telefono" aria-describedby="helpId" value="{{$user->phone}}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="Email" aria-describedby="helpId" value="{{$user->email}}">
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirmar contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirmar contraseña" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="is_admin">Admin</label>
            <input type="checkbox" name="is_admin" id="is_admin" class="form-control" placeholder="Admin" aria-describedby="helpId" {{$user->is_admin ? 'checked' : ''}}> 
        </div>
        <button type="submit" class="btn btn-primary">Actualizar usuario</button>
        <a href="{{route('admin.users.index')}}" class="btn btn-danger">Cancelar</a>
    </form>    
</div>