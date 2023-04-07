<div class="box-comments">
    <form method="POST" >
        {{-- action="{{ route('comments.store') }} --}}
        @csrf
        <div class="form-group">
          <label for="name">Nombre</label>
        </div>
        <div class="form-group">
          <label for="comment">Comentario</label>
          <textarea name="comment" id="comment" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
      <br>
    
      @if($comments->count() > 0)
        <div class="comment-list">
          @foreach($comments as $comment)
            <div class="comment">
              <h5>{{ $comment->user->name }}</h5>
              <p>{{ $comment->comentario }}</p>
              <small>{{ $comment->created_at->diffForHumans() }}</small>
            </div>
          @endforeach
        </div>
      @else
        <p>No hay comentarios aún.</p>
      @endif
    </div>
    
</div>