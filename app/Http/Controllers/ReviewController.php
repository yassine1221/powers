<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    // Public methods for user reviews
    public function index()
    {
        $reviews = Review::with('user')->latest()->paginate(10);
        $totalReviews = Review::count();
        $averageRating = Review::avg('rating');
        
        // Get rating statistics
        $ratingStats = [];
        for ($i = 1; $i <= 5; $i++) {
            $ratingStats[$i] = Review::where('rating', $i)->count();
        }

        return view('reviews.index', compact('reviews', 'totalReviews', 'averageRating', 'ratingStats'));
    }

    public function create()
    {
        return view('reviews.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'comment' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5',
            'service_type' => 'required|string',
        ]);

        $review = new Review($validated);
        $review->user_id = auth()->id();
        $review->verified_purchase = false; // Default value, can be updated by admin
        $review->save();

        return redirect()->route('reviews.index')->with('success', 'Avis ajouté avec succès');
    }

    // Admin methods
    public function adminIndex()
    {
        $reviews = Review::with('user')->latest()->paginate(15);
        $totalReviews = Review::count();
        $averageRating = Review::avg('rating');
        
        return view('admin.reviews', compact('reviews', 'totalReviews', 'averageRating'));
    }

    public function edit($id)
    {
        $review = Review::findOrFail($id);
        return view('admin.reviews.edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        
        $validated = $request->validate([
            'comment' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5',
            'service_type' => 'required|string',
            'verified_purchase' => 'boolean',
        ]);

        $review->update($validated);

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Avis mis à jour avec succès');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Avis supprimé avec succès');
    }
}
