<article class="post {{ $type }}">
	<header>
		<h2 class="title">
			<a href="/posts/{{ $post->slug }}">
				{{ $post->title }}
			</a>
		</h2>
	</header>

	<div class="content">
		<p>{!! nl2br($post->text) !!}</p>
	</div>

	<footer class="meta">
		<a href="/users/{{ $post->user->id }}" class="author">
			@<strong>{{ $post->user->name }}</strong>
		</a>

		<a href="/posts/{{ $post->slug }}#comments" class="comments">
            <comment-calc :post-id= '{{ $post->id }}' :comment-data= '{{ $post->comments }}'></comment-calc>
            <strong>{{ str_plural( 'comment', $post->comments->count()) }}</strong>
		</a>
	</footer>
</article>