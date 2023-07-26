<x-admin::layouts>
    <!-- Title of the page -->
    <x-slot:title>
        @lang('admin::app.customers.index.title')
    </x-slot:title>

    <div class="flex justify-between items-center">
        <p class="text-[20px] text-gray-800 font-bold">
            @lang('admin::app.customers.index.title')
        </p>
        
        <div class="flex gap-x-[10px] items-center">
            <!-- Create a new Customer -->
            <v-create-customer-form></v-create-customer-form>
        </div>
    </div>

    @pushOnce('scripts')
        <script type="text/x-template" id="v-create-customer-form-template">
            <div>
                <x-admin::form
                    v-slot="{ meta, errors, handleSubmit }"
                    as="div"
                >
                    <form @submit="handleSubmit($event, create)">
                        <!-- Customer Create Modal -->
                        <x-admin::modal ref="customerCreateModal">
                            <x-slot:toggle>
                                <!-- Customer Create Button -->
                                @if (bouncer()->hasPermission('customers.customers.create'))
                                    <button 
                                        type="button"
                                        class="text-gray-50 font-semibold px-[12px] py-[6px] bg-blue-600 border border-blue-700 rounded-[6px] cursor-pointer"
                                    >
                                        @lang('admin::app.customers.index.create-form.add-new-customer')
                                    </button>
                                @endif
                            </x-slot:toggle>
            
                            <x-slot:header>
                                <!-- Modal Header -->
                                <p class="text-[18px] text-gray-800 font-bold">
                                    @lang('admin::app.customers.index.create-form.create-customer')
                                </p>    
                            </x-slot:header>
            
                            <x-slot:content>
                                <!-- Modal Content -->
                                {!! view_render_event('bagisto.admin.customers.create.before') !!}

                                <div class="px-[16px] py-[10px] border-b-[1px] border-gray-300">
                                    <x-admin::form.control-group class="mb-[10px]">
                                        <x-admin::form.control-group.label>
                                            @lang('admin::app.customers.index.create-form.first-name')
                                        </x-admin::form.control-group.label>
            
                                        <x-admin::form.control-group.control
                                            type="text"
                                            name="first_name" 
                                            id="first_name" 
                                            rules="required"
                                            :label="trans('admin::app.customers.index.create-form.first-name')"
                                            :placeholder="trans('admin::app.customers.index.create-form.first-name')"
                                        >
                                        </x-admin::form.control-group.control>
            
                                        <x-admin::form.control-group.error
                                            control-name="first_name"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>
            
                                    <x-admin::form.control-group class="mb-[10px]">
                                        <x-admin::form.control-group.label>
                                            @lang('admin::app.customers.index.create-form.last-name')
                                        </x-admin::form.control-group.label>
            
                                        <x-admin::form.control-group.control
                                            type="text"
                                            name="last_name" 
                                            id="last_name"
                                            rules="required"
                                            :label="trans('admin::app.customers.index.create-form.last-name')"
                                            :placeholder="trans('admin::app.customers.index.create-form.last-name')"
                                        >
                                        </x-admin::form.control-group.control>
            
                                        <x-admin::form.control-group.error
                                            control-name="last_name"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>
            
                                    <x-admin::form.control-group class="mb-[10px]">
                                        <x-admin::form.control-group.label>
                                            @lang('admin::app.customers.index.create-form.email')
                                        </x-admin::form.control-group.label>
            
                                        <x-admin::form.control-group.control
                                            type="email"
                                            name="email"
                                            id="email"
                                            rules="required|email"
                                            :label="trans('admin::app.customers.index.create-form.email')"
                                            placeholder="email@example.com"
                                        >
                                        </x-admin::form.control-group.control>
            
                                        <x-admin::form.control-group.error
                                            control-name="email"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>
            
                                    <x-admin::form.control-group class="mb-[10px]">
                                        <x-admin::form.control-group.label>
                                            @lang('admin::app.customers.index.create-form.contact-number')
                                        </x-admin::form.control-group.label>
            
                                        <x-admin::form.control-group.control
                                            type="text"
                                            name="phone"
                                            id="phone"
                                            rules="required|integer"
                                            :label="trans('admin::app.customers.index.create-form.contact-number')"
                                            :placeholder="trans('admin::app.customers.index.create-form.contact-number')"
                                        >
                                        </x-admin::form.control-group.control>
            
                                        <x-admin::form.control-group.error
                                            control-name="phone"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>
            
                                    <x-admin::form.control-group class="mb-[10px]">
                                        <x-admin::form.control-group.label>
                                            @lang('admin::app.customers.index.create-form.date-of-birth')
                                        </x-admin::form.control-group.label>
            
                                        <x-admin::form.control-group.control
                                            type="date"
                                            name="date_of_birth" 
                                            id="dob"
                                            :label="trans('admin::app.customers.index.create-form.date-of-birth')"
                                            :placeholder="trans('admin::app.customers.index.create-form.date-of-birth')"
                                        >
                                        </x-admin::form.control-group.control>
            
                                        <x-admin::form.control-group.error
                                            control-name="date_of_birth"
                                        >
                                        </x-admin::form.control-group.error>
                                    </x-admin::form.control-group>
            
                                    <div class="flex gap-[16px] max-sm:flex-wrap">
                                        <div class="w-full mb-[6px]">
                                            <x-admin::form.control-group>
                                                <x-admin::form.control-group.label>
                                                    @lang('admin::app.customers.index.create-form.gender')
                                                </x-admin::form.control-group.label>
                    
                                                <x-admin::form.control-group.control
                                                    type="select"
                                                    name="gender"
                                                    id="gender"
                                                    rules="required"
                                                    :label="trans('admin::app.customers.index.create-form.gender')"
                                                >
                                                    <option value="">
                                                        @lang('admin::app.customers.index.create-form.select-gender')
                                                    </option>

                                                    <option value="Male">
                                                        @lang('admin::app.customers.index.create-form.male')
                                                    </option>
                                                    
                                                    <option value="Female">
                                                        @lang('admin::app.customers.index.create-form.female')
                                                    </option>

                                                    <option value="Other">
                                                        @lang('admin::app.customers.index.create-form.other')
                                                    </option>
                                                </x-admin::form.control-group.control>
                    
                                                <x-admin::form.control-group.error
                                                    control-name="gender"
                                                >
                                                </x-admin::form.control-group.error>
                                            </x-admin::form.control-group>
                                        </div>
            
                                        <div class="w-full mb-[6px]">
                                            <x-admin::form.control-group>
                                                <x-admin::form.control-group.label>
                                                    @lang('admin::app.customers.index.create-form.customer-group')
                                                </x-admin::form.control-group.label>
                    
                                                <x-admin::form.control-group.control
                                                    type="select"
                                                    name="customer_group_id"
                                                    id="customerGroup"
                                                    :label="trans('admin::app.customers.index.create-form.customer-group')"
                                                >
                                                    <option value="">
                                                        @lang('admin::app.customers.index.create-form.select-customer-group')
                                                    </option>
                                                    @foreach ($groups as $group)
                                                        <option value="{{ $group->id }}"> {{ $group->name}} </option>
                                                    @endforeach
                                                </x-admin::form.control-group.control>
                    
                                                <x-admin::form.control-group.error
                                                    control-name="customer_group_id"
                                                >
                                                </x-admin::form.control-group.error>
                                            </x-admin::form.control-group>
                                        </div>
                                    </div>
                                    {!! view_render_event('bagisto.admin.customers.create.after') !!}
                                </div>
                            </x-slot:content>
            
                            <x-slot:footer>
                                <!-- Modal Submission -->
                                <div class="flex gap-x-[10px] items-center">
                                    <button 
                                        type="submit"
                                        class="px-[12px] py-[6px] bg-blue-600 border border-blue-700 rounded-[6px] text-gray-50 font-semibold cursor-pointer"
                                    >
                                        @lang('admin::app.customers.index.create-form.save-customer')
                                    </button>
                                </div>
                            </x-slot:footer>
                        </x-admin::modal>
                    </form>
                </x-admin::form>
            </div>
        </script>

        <script type="module">
            app.component('v-create-customer-form', {
                template: '#v-create-customer-form-template',

                methods: {
                    create(params, { resetForm, setErrors }) {
                    
                        this.$axios.post("{{ route('admin.customer.store') }}", params)
                            .then((response) => {
                                this.$refs.customerCreateModal.toggle();

                                resetForm();
                            })
                            .catch(error => {
                                if (error.response.status ==422) {
                                    setErrors(error.response.data.errors);
                                }
                            });
                    }
                }
            })
        </script>
    @endPushOnce
</x-admin::layouts>