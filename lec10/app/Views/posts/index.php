<div class="mb-3">
    <a href="/" class="btn btn-secondary">Home</a>
</div>
<h2>Posts</h2>
<ul class="list-group">
    <?php foreach ($posts as $p) : ?>
        <li class="list-group-item">
            <a href="/posts/show/<?= $p['id'] ?>"><?= htmlspecialchars($p['title']) ?></a>
        </li>
    <?php endforeach; ?>
</ul>

<form action="/posts" method="post" class="mt-4">
    <div class="mb-2">
        <input name="title" class="form-control" placeholder="Title">
    </div>
    <div class="mb-2">
        <textarea name="body" class="form-control" placeholder="Body"></textarea>
    </div>
    <button class="btn btn-success">Create</button>
</form>