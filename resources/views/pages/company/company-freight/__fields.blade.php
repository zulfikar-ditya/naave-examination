<x-form  :action="$model ? route('company.company-freight.update', ['company' => $company, 'company_freight' => $item]) : route('company.company-freight.store', $company)" :method="$model ? 'update' : 'create'">
    <div class="row">
        <input type="hidden" name="company_id" value="{{$company->id}}">
        <div class="col-md-6">
            <x-select :name="'port_of_discharge_id'" :required="true" :autofocus="true">
                @foreach ($ports as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </x-select>
        </div>
        <div class="col-md-6">
            <x-select :name="'port_of_loading_id'" :required="true" :autofocus="true">
                @foreach ($ports as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </x-select>
        </div>
        <div class="col-md-6">
            <x-input :type="'number'" :name="'freight'" :value="$model ? $model->name : ''" :required="true" :autofocus="false"/>
        </div>
    </div>
</x-form>