<div class="box-comments">
    <form method="post" action="{{ route('comments.store') }}">
      @csrf
      <input type="hidden" name="book_id" value="{{ $book->id }}">
      <textarea name="comment" placeholder="Escribe un comentario"></textarea>
      <button type="submit">Enviar</button>
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