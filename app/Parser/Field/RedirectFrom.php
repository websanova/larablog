<?php

namespace Websanova\Larablog\Parser\Field;

use Websanova\Larablog\Models\Post;

class RedirectFrom
{
	public static function process($key, $val, $data)
	{
        return $data;
	}

	public static function handle($key, $val, $post)
	{
		if ( ! is_array($val)) {
			$val = [$val];
		}

		foreach ($val as $redirect_from) {
			$redirect = Post::where('slug', $redirect_from)->first();

			$data = [
				'slug' => $redirect_from,
				'title' => '',
				'body' => '',
				'type' => 'redirect',
				'meta' => json_encode([
					'redirect_to' => $post->slug
				])
			];

			if ($redirect) {
				$redirect->fill($data);

				if ($redirect->isDirty()) {
					$redirect->save();
					echo 'Update Redirect: ' . $redirect_from . "\n";
				}
			}
			else {
				$redirect = Post::create($data);

				echo 'New Redirect: ' . $redirect_from . "\n";
			}
		}
	}
}