<section id="comments" class="section comments columns is-centered">
	<ol class="is-size-5 column is-three-quarters">

        @auth
            <comment-create :post-id= '{{ $post->id }}' :commented-user= '{{ Auth::user() }}'> 
            </comment-create>
        @endauth

        <comment-list :post-data= '{{$post}}' >
        </comment-list>
	</ol>
</section>