<div class="edit-book">
    <form action="{{route('admin.books.update', $book)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="edit-book__title">
            <h1 class="title-crud">Editar libro</h1>
        </div>
        <div class="edit-book__inputs">
            <div class="edit-book__inputs__input">
                <label for="title">Titulo</label>
                <input type="text" name="title" id="title" value="{{$book->title}}">
                 @error('title')
                    <div><strong>{{$message}}</strong></div>
                @enderror
            </div>
            <div class="edit-book__inputs__input">
                <label for="subtitle">Subtitulo</label>
                <input type="text" name="subtitle" id="subtitle" value="{{$book->subtitle}}">
                 @error('subtitle')
                    <div><strong>{{$message}}</strong></div>
                @enderror
            </div>
            <div class="edit-book__inputs__input">
                <label for="authors">Autor</label>
                <input type="text" name="authors" id="authors" value="{{$book->authors}}">
                 @error('authors')
                    <div><strong>{{$message}}</strong></div>
                @enderror
            </div>
            <div class="edit-book__inputs__input">
                <label for="description">Descripcion</label>
                <textarea name="description" id="description" cols="30" rows="10">{{$book->description}}</textarea>
                @error('description')
                    <div><strong>{{$message}}</strong></div>
                @enderror
            </div>
            <div class="edit-book__inputs__input">
                <label for="categories">Categoria</label>
                <input type="text" name="categories" id="categories" value="{{$book->categories}}">
                 @error('categories')
                    <div><strong>{{$message}}</strong></div>
                @enderror
            </div>
            <div class="edit-book__inputs__input">
                <label for="published_date">Fecha de publicacion</label>
                <input type="date" name="published_date" id="published_date" value="{{$book->published_date}}">
                 @error('published_date')
                    <div><strong>{{$message}}</strong></div>
                @enderror
            </div>
            <div class="edit-book__inputs__input">
                <label for="page_count">Numero de paginas</label>
                <input type="number" name="page_count" id="page_count" value="{{$book->page_count}}">
                 @error('page_count')
                    <div><strong>{{$message}}</strong></div>
                @enderror
            </div>
            <div class="edit-book__inputs__input">
                <label for="thumbnail">Imagen</label>
                <input type="text" name="thumbnail" id="thumbnail" value="{{$book->thumbnail}}">
                 @error('thumbnail')
                    <div><strong>{{$message}}</strong></div>
                @enderror
            </div>
            <div class="edit-book__inputs__input">
                <label for="identifier">Identificador</label>   
                <input type="text" name="identifier" id="identifier" value="{{$book->identifier}}">
                 @error('identifier')
                    <div><strong>{{$message}}</strong></div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Editar libro</button>
            <a href="{{route('admin.books.index')}}" class="btn btn-danger">Cancelar</a>
</div>

