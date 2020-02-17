<?php

namespace Raffles\Modules\Linkre\Http\Controllers\Articles;

use Raffles\Http\Controllers\Articles\ArticleController as Controller;
use Raffles\Modules\Linkre\Repositories\FeedRepository;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param Request $request The request object.
     * @param string  $key     The model key.
     *
     * @return mixed
     */
    public function show(Request $request, $key)
    {
        $model = $this->findFirstByKey($key);

        if (!$model) {
            return $this->validNotFoundJsonResponse();
        }

        try {
            $user = $request->user('api');

            $repository = new FeedRepository;
            $repository->create(
                [
                    'description' => 'El usuario '.$user->name.' ('.$user->document_type->name.' '.$user->document_number.') visualizó la noticia "'.$model->title.'".',
                    'feedable_id' => $model->id,
                    'feedable_type' => 'articles',
                    'title' => 'Visualización de Noticias',
                    'user_id' => $user->id
                ]
            );
        } catch (\Exception $e) {
            //
        }

        return response()->json($model, 200, [], JSON_PRETTY_PRINT);
    }
}
