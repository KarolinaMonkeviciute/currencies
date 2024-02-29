<?php

namespace App\Http\Controllers;

use App\Services\GetSelectedCurrencyRateService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Repositories\ItemRepository;
use App\Repositories\CurrencyRepository;
use App\Models\Item;
use Illuminate\Http\RedirectResponse;


class ItemController extends Controller
{
    protected $itemRepository;
    protected $currencyRepository;
    protected $getSelectedCurrencyService;

    public function __construct(ItemRepository $itemRepository, CurrencyRepository $currencyRepository, GetSelectedCurrencyRateService $getSelectedCurrencyService)
    {
        $this->itemRepository = $itemRepository;
        $this->currencyRepository = $currencyRepository;
        $this->getSelectedCurrencyService = $getSelectedCurrencyService;
    }

    public function index(Request $request): View
    {
        $items = $this->itemRepository->showAll();
        $currencies = $this->currencyRepository->showAll();
        $selectedCurrency = $request->query('currency');

        if($selectedCurrency){
            $rate = $this->getSelectedCurrencyService->getRate($selectedCurrency);
        } else {
            $rate = 1;
        }

        return view('index', [
            'items' => $items,
            'currencies' => $currencies,
            'selectedCurrency' => $selectedCurrency,
            'rate' => $rate,
        ]);
    }

    public function create(): View{
        return view('items.create');
    }

    public function store(Request $request): RedirectResponse{
        $data = $request->all();
        $this->itemRepository->save($data);
        return redirect()->route('index');
    }

    public function edit(Item $item): View{
        return view('items.edit',[
            'item' => $item,
        ]);
    }

    public function update(Request $request, Item $item): RedirectResponse{
        $data = $request->all();
        $this->itemRepository->edit($data, $item);
        return redirect()->route('index');
    }

    public function destroy(Item $item): RedirectResponse{
        $this->itemRepository->destroy($item);
        return redirect()->route('index');
    }
}