
<div class="edit-user">
    <form action="{{route('admin.users.update', $user)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" aria-describedby="helpId" value="{{$user->name}}">
            @error('name')
                <div class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="surname">Apellido</label>
            <input type="text" name="surname" id="surname" class="form-control" placeholder="Apellido" aria-describedby="helpId" value="{{$user->surname}}">
            @error('surname')
                <div class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="dni">DNI</label>
            <input type="text" name="dni" id="dni" class="form-control" placeholder="DNI" aria-describedby="helpId" value="{{$user->dni}}">
            @error('dni')
                <div class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone">Telefono</label>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Telefono" aria-describedby="helpId" value="{{$user->phone}}">
            @error('phone')
                <div class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="Email" aria-describedby="helpId" value="{{$user->email}}">
            @error('email')
                <div class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="is_admin">Admin</label>
            <input type="checkbox" name="is_admin" id="is_admin" class="form-control" placeholder="Admin" aria-describedby="helpId" {{ boolval($user->is_admin) ? 'checked' : '' }}>
        <button type="submit" class="btn btn-primary">Actualizar usuario</button>
        <a href="{{route('admin.users.index')}}" class="btn btn-danger">Cancelar</a>
    </form>    
</div>