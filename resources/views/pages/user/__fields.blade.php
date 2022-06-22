<x-form  :action="$model ? route('user.update', $model) : route('user.store')" :method="$model ? 'update' : 'create'">
    <div class="row">

        <div class="col-md-6">
            <x-input :type="'text'" :name="'name'" :value="$model ? $model->name : ''" :required="true" :autofocus="true"/>
        </div>
        <div class="col-md-6">
            <x-input :type="'text'" :name="'email'" :value="$model ? $model->email : ''" :required="true" :autofocus="false"/>
        </div>
        <div class="col-md-6">
            <x-input :type="'text'" :name="'password'" :value="''" :required="$model ? false : true" :autofocus="false"/>
        </div>

    </div>
</x-form>