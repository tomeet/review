<?php


namespace Tomeet\Reviews\Traits;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Exception;

trait HasReviews
{
    public static function bootHasReviews()
    {

    }

    public function reviews(): MorphMany
    {
        return $this->morphMany(config('review.models.review'), 'reviewable');
    }

    public function addReview(array $data)
    {
        if (empty($data['apply_type'])) {
            throw new Exception('Unknown audit type!');
        }

        $this->reviews()->create($data);
    }

    public function setReview(array $data)
    {
        $data['reviewed_at'] = Carbon::now()->toDateTimeString();
        $this->reviews()->update($data);
    }

    public function setReviewPass()
    {
        $review = $this->reviews()->last();
        $review->status = 1;
        $review->reviewed_at = Carbon::now()->toDateTimeString();
        $review->save();
    }

    public function setReviewFail($suggestion = '')
    {
        $review = $this->reviews()->last();
        $review->status = -1;
        $review->suggestion = $suggestion;
        $review->reviewed_at = Carbon::now()->toDateTimeString();
        $review->save();
    }
}
