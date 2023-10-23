@extends('layouts.app')
<div class="container"
    style="background: #00B4DB; background: -webkit-linear-gradient(to right, #0083B0, #00B4DB); background: linear-gradient(to right, #0083B0, #00B4DB); color: #514B64; min-height: 100vh;">
    <section>
        <div class="container py-5">

            <header class="text-center mb-5 text-white">
                <div class="row">
                    <div class="col-lg-12 mx-auto">
                        <h1 style="font-size: 2rem; font-weight: bold; text-transform: uppercase;">Laravel 9 Cashier
                            Stripe Subscription</h1>
                        <h3 style="font-size: 1.5rem;">PRICING</h3>
                    </div>
                </div>
            </header>

            <div class="row text-center align-items-end">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div
                        style="background: white; padding: 1.5rem; border-radius: 1rem; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                        <h1
                            style="font-size: 1.5rem; text-transform: uppercase; font-weight: bold; margin-bottom: 1rem;">
                            FREE</h1>
                        <h2 style="font-size: 2rem; font-weight: bold;">$0<span
                                style="font-size: 1rem; font-weight: normal;">/ free</span></h2>

                        <div
                            style="width: 5rem; height: 6px; border-radius: 1rem; background: #0083B0; margin: 2rem auto;">
                        </div>

                        <ul style="list-style: none; padding: 0; margin: 1rem 0; font-size: 0.9rem; text-align: left;">
                            <li style="margin-bottom: 1rem;">
                                <i style="color: #0083B0;" class="fa fa-check mr-2"></i> Lorem ipsum dolor sit amet
                            </li>
                            <li style="margin-bottom: 1rem;">
                                <i style="color: #0083B0;" class="fa fa-check mr-2"></i> Sed ut perspiciatis
                            </li>
                            <li style="margin-bottom: 1rem;">
                                <i style="color: #0083B0;" class="fa fa-check mr-2"></i> At vero eos et accusamus
                            </li>
                            <li style="color: #514B64; text-decoration: line-through; margin-bottom: 1rem;">
                                <i class="fa fa-times mr-2"></i> Nam libero tempore
                            </li>
                            <li style="color: #514B64; text-decoration: line-through; margin-bottom: 1rem;">
                                <i class="fa fa-times mr-2"></i> Sed ut perspiciatis
                            </li>
                            <li style="color: #514B64; text-decoration: line-through; margin-bottom: 1rem;">
                                <i class="fa fa-times mr-2"></i> Sed ut perspiciatis
                            </li>
                        </ul>
                        <a href="#"
                            style="background: #0083B0; border: 2px solid #0083B0; color: white; display: block; text-align: center; padding: 1rem 0; border-radius: 2rem; font-weight: bold; text-decoration: none; margin-top: 1rem;">Buy
                            Now</a>

                    </div>

                </div>

                @foreach ($plans as $plan)
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div
                            style="background: white; padding: 1.5rem; border-radius: 1rem; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                            <h1
                                style="font-size: 1.5rem; text-transform: uppercase; font-weight: bold; margin-bottom: 1rem;">
                                {{ $plan->name }}</h1>
                            <h2 style="font-size: 2rem; font-weight: bold;">${{ $plan->price }}<span
                                    style="font-size: 1rem; font-weight: normal;">/ month</span></h2>

                            <div
                                style="width: 5rem; height: 6px; border-radius: 1rem; background: #0083B0; margin: 2rem auto;">
                            </div>

                            <ul
                                style="list-style: none; padding: 0; margin: 1rem 0; font-size: 0.9rem; text-align: left;">
                                <li style="margin-bottom: 1rem;">
                                    <i style="color: #0083B0;" class="fa fa-check mr-2"></i> Lorem ipsum dolor sit amet
                                </li>
                                <li style="margin-bottom: 1rem;">
                                    <i style="color: #0083B0;" class="fa fa-check mr-2"></i> Sed ut perspiciatis
                                </li>
                                <li style="margin-bottom: 1rem;">
                                    <i style="color: #0083B0;" class="fa fa-check mr-2"></i> At vero eos et accusamus
                                </li>
                                <li style="margin-bottom: 1rem;">
                                    <i style="color: #0083B0;" class="fa fa-check mr-2"></i> Nam libero tempore
                                </li>
                                <li style="margin-bottom: 1rem;">
                                    <i style="color: #0083B0;" class="fa fa-check mr-2"></i> Sed ut perspiciatis
                                </li>
                                <li style="color: #514B64; text-decoration: line-through; margin-bottom: 1rem;">
                                    <i class="fa fa-times mr-2"></i> Sed ut perspiciatis
                                </li>
                            </ul>
                            <a href="{{ route('plans.show', $plan->slug) }}"
                                style="background: #0083B0; border: 2px solid #0083B0; color: white; display: block; text-align: center; padding: 1rem 0; border-radius: 2rem; font-weight: bold; text-decoration: none; margin-top: 1rem;">Buy
                                Now</a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>

</div>
