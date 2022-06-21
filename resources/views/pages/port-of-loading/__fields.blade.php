<x-form  :action="$model ? route('port-of-loading.update', $model) : route('port-of-loading.store')" :method="$model ? 'update' : 'create'">
    <div class="row">

        <div class="col-md-6">
            <x-input :type="'text'" :name="'name'" :value="$model ? $model->name : ''" :required="true" :autofocus="true"/>
        </div>

    </div>
</x-form>