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
        <p>This is the edit page.</p>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
      
       @foreach ($events as $event)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->name }}</h5>
                    <p class="card-text">{{ $event->description }}</p>
                    <p class="card-text"><small class="text-muted">Start: {{ $event->start_date }} | End: {{ $event->end_date }}</small></p>
                    <p class="card-text">
                        Categories:
                        @foreach ($event->categories as $category)
                            <span class="badge bg-secondary">{{ $category->name }}</span>
                            @if ($category->pivot->featured)
                                <span class="badge bg-dark">👽</span>
                            @endif
                        @endforeach
                    </p>
                   <!-- Add edit and delete buttons here if needed -->
                   <a href="/events/edit/{{$event->id}}" class="btn btn-primary">Edit</a>
                   <a href="/events/delete/{{$event->id}}" class="btn btn-danger">Delete</a>
                </div>
            </div>
       @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>