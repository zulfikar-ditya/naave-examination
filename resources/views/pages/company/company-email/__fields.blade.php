<x-form  :action="$model ? route('company.company-email.update', ['company' => $company, 'company_email' => $item]) : route('company.company-email.store', $company)" :method="$model ? 'update' : 'create'">
    <div class="row">
        <input type="hidden" name="company_id" value="{{$company->id}}">
        <div class="col-md-6">
            <x-input :type="'email'" :name="'email'" :value="$model ? $model->name : ''" :required="true" :autofocus="true"/>
        </div>
    </div>
</x-form>