<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1>Welcome to the Events App</h1>
        <p>This is the home page.</p>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="/events" method="post">
        @csrf
            <input type="text" name="name" placeholder="Event name" class="form-control mb-2">
            <input type="text" name="description" placeholder="Event description" class="form-control mb-2">
            <input type="date" name="start_date" class="form-control mb-2">
            <input type="date" name="end_date" class="form-control mb-2">
            Add categories:
            @foreach($categories as $category)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}">
                    <label class="form-check-label" for="category{{ $category->id }}">
                        {{ $category->name }}
                    </label>
                </div>
            @endforeach
            Featured:
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="featured" value="1" id="featured">
                <label class="form-check-label" for="featured">
                    Yes
                </label>
            </div>
            
            <button type="submit" class="btn btn-primary">Add event</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>