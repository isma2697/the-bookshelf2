<div class="create-book__form">
    <form action="{{route('admin.books.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="create-book__form__title">
            <h1 class="title-crud">Crear nuevo libro</h1>
        </div>
        <div class="create-book__form__inputs">
            <div class="create-book__form__inputs__input">
                <label for="title">Titulo</label>
                <input type="text" name="title" id="title" value="{{old('title')}}">
            </div>
            <div class="create-book__form__inputs__input">
                <label for="subtitle">Subtitulo</label>
                <input type="text" name="subtitle" id="subtitle" value="{{old('subtitle')}}">
            </div>
            <div class="create-book__form__inputs__input">
                <label for="authors">Autor</label>
                <input type="text" name="authors" id="authors" value="{{old('authors')}}">
            </div>
            <div class="create-book__form__inputs__input">
                <label for="description">Descripcion</label>
                <textarea name="description" id="description" cols="30" rows="10">{{old('description')}}</textarea>
            </div>
            <div class="create-book__form__inputs__input">
                <label for="categories">Categoria</label>
                <input type="text" name="categories" id="categories" value="{{old('categories')}}">
            </div>
            <div class="create-book__form__inputs__input">
                <label for="published_date">Fecha de publicacion</label>
                <input type="date" name="published_date" id="published_date" value="{{old('published_date')}}">
            </div>
            <div class="create-book__form__inputs__input">
                <label for="page_count">Numero de paginas</label>
                <input type="number" name="page_count" id="page_count" value="{{old('page_count')}}">
            </div>
            <div class="create-book__form__inputs__input">
                <label for="thumbnail">Imagen</label>
                <input type="text" name="thumbnail" id="thumbnail" value="{{old('thumbnail')}}">
            </div>
            <div class="create-book__form__inputs__input">
                <label for="identifier">Identificador</label>
                <input type="text" name="identifier" id="identifier" value="{{old('identifier')}}"> 
            </div>
            <button type="submit" class="btn btn-primary">Crear libro</button>
            <a href="{{route('admin.books.index')}}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>



               