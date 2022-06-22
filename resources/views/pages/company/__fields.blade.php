<x-form  :action="$model ? route('company.update', $model) : route('company.store')" :method="$model ? 'update' : 'create'">
    <div class="row">

        <div class="col-md-6">
            <x-input :type="'text'" :name="'name'" :value="$model ? $model->name : ''" :required="true" :autofocus="true"/>
        </div>
        <div class="col-md-6">
            <x-input :type="'file'" :name="'siup'" :value="''" :required="$model ? false : true" :autofocus="false"/>
        </div>
        <div class="col-md-6">
            <x-input :type="'file'" :name="'npwp'" :value="''" :required="$model ? false : true" :autofocus="false"/>
        </div>
        <div class="col-md-6">
            <x-input :type="'number'" :name="'contact_person'" :value="$model ? $model->contact_person : ''" :required="true" :autofocus="false"/>
        </div>
        <div class="col-md-6">
            <x-input :type="'text'" :name="'address'" :value="$model ? $model->address : ''" :required="true" :autofocus="false"/>
        </div>

    </div>
</x-form>