<tr class="product_row" id="tr_{{ $item['id'] }}">
    <th><input class="sub_chk text-center width-50" data-id="{{ $item['id'] }}" type="checkbox"></th>

    {{-- Get art_crop and normal image link --}}
    <td class="td-height">
        @if ($item['product']['art_crop'] !== null && $item['product']['normal'] !== null)
        <img src="{{ $item['product']['art_crop'] }}" alt="{{ $item['product']['name'] }}" class="thumbnail align-middle text-center" onmouseenter="this.src='{{ $item['product']['normal'] }}'" onmouseleave="this.src='{{ $item['product']['art_crop'] }}'">
        @endif
    </td>

    <td class="align-middle text-center width-400">{{ $item['product']['name'] }}</td>

    <td class="align-middle text-center width-400">{{ $item['product']['color_identity'] }}</td>

    <td class="align-middle text-center width-400">{{ $item['product']['type_line'] }}</td>

    <td class="align-middle text-center">{{ $item['product']['frame_effects'] }}</td>

    <td class="align-middle text-center width-400">{{ $item['printing'] }}</td>

    <td class="align-middle text-center width-400">{{ $item['product']['rarity'] }}</td>

    {{-- Increment/Decrement --}}
    <td class="text-center align-middle col-1">
        <div class="btn-group" role="group" aria-label="Quantity">
            <form method="post" action="{{ route('quantity.down', $item['id']) }}" class="disable-form">
                @method('PUT')
                @csrf
                <button type="submit" class="btn btn-outline-secondary rounded-pill btn-sm disable-quantity"><i class="icon-minus2"></i></button>
            </form>
            <span class="mx-3">{{ $item['quantity'] }}</span>
            <form method="post" action="{{ route('quantity.up', $item['id']) }}" class="disable-form">
                @method('PUT')
                @csrf
                <button type="submit" class="btn btn-outline-secondary rounded-pill btn-sm disable-quantity"><i class="icon-plus2"></i></button>
            </form>
        </div>
    </td>

    {{-- Price (Edit) --}}
    <td class="col-1 align-middle width-400">
        <form method="post" action="{{ route('price_each.edit', $item['id']) }}" class="disable-form" id="price_edit_{{ $item['id'] }}">
            @method('PUT')
            @csrf
            <div class="input-group text-center">
                <div class="input-group-text">
                    {{-- Add Currency Symbol --}}
                    @foreach ($settings['currency_option'] as $currency)
                    @if ($settings['tcg_mid'] === $currency['id'])
                    {{ $currency['symbol'] }}
                    @endif
                    @endforeach
                </div>
                <input name="price_each" value="{{ $item['price_each'] }}" type="text" class="form-control price_input " id="price_input_{{ $item['id'] }}"><span hidden>{{ $item['price_each'] }}</span>
            </div>
        </form>
    </td>

    <td class="align-middle text-center width-120">
        <strong>
            ${{ number_format(floatval($item['quantity']) * floatval(preg_replace('/[^-0-9\.]/', '', $item['price_each'])), 2) }}
        </strong>
    </td>

    {{-- Action Column --}}
    <td class="text-center align-middle">
        <div class="icons-list btn-group">
            <a class="btn" href="#view{{ $item['id'] }}" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="View {{ $item['product']['name'] }}"><i class="icon-eye2"></i></a>
            @include('admin.inventory.action-popUp.view')

            <a class="btn" data-target="#edit{{ $item['id'] }}" data-toggle="modal" data-placement="top" title="Sold {{ $item['product']['name'] }}" @if ($item['quantity']===0) disabled @endif><i class="icon-cart5"></i></a>
            @include('admin.inventory.action-popUp.view')
            <a class="btn" data-target="#delete{{ $item['id'] }}" data-toggle="modal" data-placement="top" title="Delete {{ $item['product']['name'] }}"><i class="icon-trash"></i></a>
            @include('admin.inventory.action-popUp.action')

        </div>
    </td>
</tr>  