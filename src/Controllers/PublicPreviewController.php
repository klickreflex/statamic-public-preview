<?php

namespace Modrictin\StatamicPublicPreview\Controllers;

use Illuminate\Http\Request;
use Modrictin\StatamicPublicPreview\Models\EntryPublicPreview;
use Statamic\Entries\Entry;
use Statamic\Facades\Entry as EntryAPI;

class PublicPreviewController
{
    public function show(Request $request, $id)
    {
        $publicPreview = EntryPublicPreview::findOr($id);

        if ($publicPreview->valid_until->isBefore(now())) {
            abort(404);
        }

        /** @var Entry $entry */
        $entry = EntryAPI::find($publicPreview->entry_id);

        if ($entry->hasWorkingCopy()) {
            return $entry->fromWorkingCopy()->published(true);
        }

        if ($entry->published()) {
            return redirect($entry->url());
        }

        // Indicate that we are "reviewing" the entry,
        // in we want to use this in the frontend
        $entry->setSupplement('public_review', true);

        return $entry->published(true);
    }
}
