<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-5" x-data="pricing">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                        <div class="lg:flex items-center ml-3 justify-between">
                            <div class="p-5 md:p-0 lg:p-0  lg:w-1/2 w-full">
                                <p class="text-base leading-4 text-gray-600 dark:text-gray-200">Choose your plan</p>
                                <h1 role="heading"
                                    class="md:text-5xl text-3xl font-bold leading-10 mt-3 text-gray-800 dark:text-white">
                                    Our
                                    pricing plan</h1>
                                <p role="contentinfo" class="text-base leading-5 mt-5 text-gray-600 dark:text-gray-200">
                                    We’re
                                    working on a suit of tools to make managing complex systems easier, for everyone.
                                    we can’t wait to hear what you think</p>
                                <div class="w-56">
                                    <button
                                        class="bg-gray-100 dark:bg-gray-800 shadow rounded-full flex items-center mt-10 rounded-full">
                                        <div @click="monthly = ! monthly"
                                            :class="monthly ? 'bg-indigo-700 text-white' : 'bg-gray-100 dark:bg-gray-800'"
                                            class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:outline-none 
                        text-base leading-none text-gray-600 dark:text-gray-200 rounded-full py-4 px-6 mr-1"
                                            id="monthly">Monthly</div>
                                        <div @click="monthly = ! monthly"
                                            :class="monthly ? 'bg-gray-100 dark:bg-gray-800' : 'bg-indigo-700 text-white'"
                                            class=" focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:outline-none text-base leading-none text-gray-600 dark:text-gray-200 rounded-full py-4 px-6 mr-1"
                                            id="annually">Annually</div>

                                    </button>
                                </div>
                            </div>
                            <div class="xl:w-1/2 lg:w-7/12 relative w-full lg:mt-0 mt-12 md:px-8" role="list">
                                <img src="https://i.ibb.co/0n6DSS3/bgimg.png" class="absolute w-full -ml-12 mt-24"
                                    alt="background circle images" />
                                <div role="listitem" @click="toggle(getStandardPrice())"
                                    class="bg-white dark:bg-gray-800 cursor-pointer shadow rounded-lg mt-3 flex relative z-30">
                                    <div x-show="isSelected"
                                        class="w-2.5 h-auto bg-indigo-700 rounded-tl-md rounded-bl-md">
                                    </div>
                                    <div class="w-full p-8">
                                        <div class="md:flex items-center justify-between">
                                            <h2 class="text-2xl font-semibold leading-6 text-gray-800 dark:text-white">
                                                Standard
                                            </h2>
                                            <p x-show="monthly"
                                                class="text-2xl md:mt-0 mt-4 font-semibold leading-6 text-gray-800 dark:text-white">
                                                $80<span class="font-normal text-base">/mo</span></p>

                                            <p x-show="!monthly"
                                                class="text-2xl md:mt-0 mt-4 font-semibold leading-6 text-gray-800 dark:text-white">
                                                $672<span class="font-normal text-base">/an</span></p>
                                        </div>
                                        <p class="md:w-80 text-base leading-6 mt-4 text-gray-600 dark:text-gray-200">
                                            Standard
                                            products features and dedicated support channels</p>

                                        <p x-show="!monthly" class="md:w-80 mt-2 text-green-600 ">
                                            You saved: $288.00</p>
                                    </div>
                                </div>

                                <div role="listitem" @click="toggle(getPremiumPrice())"
                                    class="bg-white dark:bg-gray-800 cursor-pointer shadow rounded-lg mt-3 flex relative z-30">
                                    <div x-show="!isSelected"
                                        class="w-2.5 h-auto bg-indigo-700 rounded-tl-md rounded-bl-md">
                                    </div>
                                    <div class="w-full p-8">
                                        <div class="md:flex items-center justify-between">
                                            <h2 class="text-2xl font-semibold leading-6 text-gray-800 dark:text-white">
                                                Premium
                                            </h2>
                                            <p x-show="monthly"
                                                class="text-2xl md:mt-0 mt-4 font-semibold leading-6 text-gray-800 dark:text-white">
                                                $180<span class="font-normal text-base">/mo</span></p>
                                            <p x-show="!monthly"
                                                class="text-2xl md:mt-0 mt-4 font-semibold leading-6 text-gray-800 dark:text-white">
                                                $1,296<span class="font-normal text-base">/an</span></p>

                                        </div>
                                        <p class="md:w-80 text-base leading-6 mt-4 text-gray-600 dark:text-gray-200">
                                            Premium
                                            plan features and dedicated support channels</p>

                                        <p x-show="!monthly" class="md:w-80 mt-2 text-green-600 ">
                                            You saved: $864</p>
                                    </div>
                                </div>

                                <div class="p-5 md:p-0 lg:p-0 ">
                                    <label class="relative w-full flex flex-col">
                                        <span class="font-bold mb-2 mt-2">Card Holder</span>
                                        <input id="card-holder-name"
                                            class="rounded-md peer pl-12 pr-2 py-2 border-2 border-gray-200 placeholder-gray-300"
                                            type="text" name="card_holder" placeholder="Card Holder" />
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="absolute bottom-0 left-0 -mb-0.5 transform translate-x-1/2 -translate-y-1/2 text-black peer-placeholder-shown:text-gray-300 h-6 w-6"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M5.121 17.804A13.937 13.937 0 0 1 12 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0z" />
                                        </svg>
                                    </label>

                                    <label class="relative w-full flex flex-col">
                                        <span class="font-bold mb-2 mt-2">Card number</span>

                                        <div class="rounded-md peer pl-3 p-2 py-3 border-2 border-gray-200 placeholder-gray-300"
                                            id="card-element"></div>

                                    </label>

                                    <span x-show="successMessage!=''" class="w-full flex flex-col text-green-500"
                                        x-text="successMessage"></span>
                                    <span x-show="errorMessage!=''" class="w-full flex flex-col text-red-500"
                                        x-text="errorMessage"></span>


                                    <x-button x-text="processing ? 'Processing...' : 'Subscribe'" @click="subscribe"
                                        class="mt-4" id="card-button" data-secret="{{ $intent->client_secret }}">
                                        Subscribe
                                    </x-button>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://js.stripe.com/v3/"></script>

        <script>
        const stripe = Stripe('{{env("STRIPE_KEY")}}');

        const elements = stripe.elements();
        const cardElement = elements.create('card');

        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;
        const cardHolderName = document.getElementById('card-holder-name');

        cardElement.mount('#card-element');

        document.addEventListener('alpine:init', () => {
            Alpine.data('pricing', () => ({
                monthly: true,
                successMessage: '',
                errorMessage: '',
                isSelected: true,
                processing: false,
                selectedPlanId: 'standard_monthly',
                getStandardPrice() {
                    return this.monthly ? 'standard_monthly' : 'standard_annually'
                },
                getPremiumPrice() {
                    return this.monthly ? 'premium_monthly' : 'premium_annually'
                },
                toggle(planId) {
                    this.isSelected = !this.isSelected
                    this.selectedPlanId = planId

                },
                async subscribe() {
                    this.processing = true
                    const {
                        setupIntent,
                        error
                    } = await stripe.confirmCardSetup(
                        clientSecret, {
                            payment_method: {
                                card: cardElement,
                                billing_details: {
                                    name: cardHolderName.value
                                }
                            }
                        }
                    );



                    if (error) {

                        this.errorMessage = error.message
                        return;
                    }


                    let response = axios.post('{{route("subscribe")}}', {
                        'paymentMethodId': setupIntent.payment_method,
                        'planId': this.selectedPlanId,
                        '_token': "{{ csrf_token() }}",
                    });

                    response.then(response => {

                        this.successMessage = response.data.message
                        location.reload();
                    })

                    response.catch(({
                        response
                    }) => {
                        this.errorMessage = response.data.message
                    })

                    response.finally(() => this.processing = false)
                }
            }))
        })
        </script>
</x-app-layout>