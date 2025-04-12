use Illuminate\Database\Eloquent\ModelNotFoundException;

public function render($request, Throwable $exception)
{
    if ($exception instanceof ModelNotFoundException) {
        return response()->view('errors.404', [], 404);
    }

    return parent::render($request, $exception);
}
