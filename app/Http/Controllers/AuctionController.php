<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\Auction\CreateAuctionRequest;
use App\Http\Requests\Auction\GetAuctionRequest;
use App\Models\Auction;
use Illuminate\Support\Facades\Auth;

class AuctionController extends Controller
{
    private $auction;

    public function __construct(Auction $auction)
    {
        $this->auction = $auction;
    }

    public function get(GetAuctionRequest $request)
    {
        $data = $request->validated();
        $auctions = $this->auction->filterData($data);
        return ResponseHelper::operationSuccess($auctions);
    }

    public function create(CreateAuctionRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $created = $this->auction->create($data);
        return empty($created)
            ? ResponseHelper::operationFail()
            : ResponseHelper::create($created);
    }
}
