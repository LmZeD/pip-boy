<div class="inventory-section-holder">
    <div class="inventory-section-holder__left">
        @foreach($items as $item)
            <div wire:click="makeItemActive({{$item['id']}})"
                 class="inventory-section-holder-left__row @if($item['id'] == $activeItem) inventory-section-holder-left-row__active @endif">
                @php($amount = auth()->user()->getInventoryItemQuantity($item['id']))
                @if (auth()->user()->isItemEquipped($item['id']))
                    @if($item['id'] == $activeItem)
                        <span class="equipped-active"></span>
                    @else
                        <span class="equipped"></span>
                    @endif
                @endif
                {{$item['title']}} {{$amount > 1 ? ' ('.$amount.')' : ''}}
            </div>
        @endforeach
    </div>

    <div class="inventory-section-holder__right">
        @foreach($items as $item)
            <div class="inventory-section-holder-right__item-holder @if($item['id'] != $activeItem) hidden @endif">
                <div class="inventory-section-holder-right-item-holder__upper">
                    <img src="{{asset('images/inventory/'.$item['image_name'])}}" alt="">
                </div>
                <div class="inventory-section-holder-right-item-holder__lower">
                    @if(isset($item['damage']))
                        <div class="inventory-section-holder-right-item-holder-lower__row">
                            <div class="">
                                {{__('Damage')}}
                            </div>
                            <div class="">
                                <img src="{{asset('images/aim.png')}}" alt="">
                                {{$item['damage']}}
                            </div>
                        </div>
                    @endif
                    @if(isset($item['ammo_type']))
                        <div class="inventory-section-holder-right-item-holder-lower__row">
                            <div class="" style="display: flex; align-items: center;">
                                <div class="bullet-holder">
                                    <img src="{{asset('images/bullet.png')}}" alt="">
                                    <img src="{{asset('images/bullet.png')}}" alt="">
                                    <img src="{{asset('images/bullet.png')}}" alt="">
                                </div>
                                {{$item['ammo_type']}}
                            </div>
                            <div class="">
                                {{auth()->user()->getInventoryItemQuantity($item['ammo_type'])}}
                            </div>
                        </div>
                    @endif
                    @if(isset($item['fire_rate']))
                        <div class="inventory-section-holder-right-item-holder-lower__row">
                            <div class="">
                                {{__('Fire Rate')}}
                            </div>
                            <div class="">
                                {{$item['fire_rate']}}
                            </div>
                        </div>
                    @endif
                    @if(isset($item['range']))
                        <div class="inventory-section-holder-right-item-holder-lower__row">
                            <div class="">
                                {{__('Range')}}
                            </div>
                            <div class="">
                                {{$item['range']}}
                            </div>
                        </div>
                    @endif
                    @if(isset($item['accuracy']))
                        <div class="inventory-section-holder-right-item-holder-lower__row">
                            <div class="">
                                {{__('Accuracy')}}
                            </div>
                            <div class="">
                                {{$item['accuracy']}}
                            </div>
                        </div>
                    @endif
                    @if(isset($item['weight']))
                        <div class="inventory-section-holder-right-item-holder-lower__row">
                            <div class="">
                                {{__('Weight')}}
                            </div>
                            <div class="">
                                {{$item['weight']}}
                            </div>
                        </div>
                    @endif
                    @if(isset($item['value']))
                        <div class="inventory-section-holder-right-item-holder-lower__row">
                            <div class="">
                                {{__('Value')}}
                            </div>
                            <div class="">
                                {{$item['value']}}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
