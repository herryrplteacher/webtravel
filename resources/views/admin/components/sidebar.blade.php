<div data-simplebar class="h-full">
    <!--- Sidemenu -->
    <div class="metismenu pb-10 pt-2.5" id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul id="side-menu">
            <li class="px-5 py-3 text-xs font-medium text-gray-500 cursor-default leading-[18px] group-data-[sidebar-size=sm]:hidden block"
                data-key="t-menu">Menu</li>

            <li>
                <a href="index.html"
                    class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                    <i data-feather="home" fill="#545a6d33"></i>
                    <span data-key="t-dashboard"> Dashboard</span>
                </a>
            </li>

            <li>
                <a href="javascript: void(0);" aria-expanded="false"
                    class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear nav-menu hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                    <i data-feather="grid" class="align-middle" fill="#545a6d33"></i>
                    <span data-key="t-apps"> Master Data </span>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('index.service') }}"
                            class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Service</a>
                    </li>
                    <li>
                        <a href="{{ route('index.location') }}"
                            class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Locations</a>
                    </li>

                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear nav-menu pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <span data-key="t-apps">Email</span>
                        </a>
                        <ul>
                            <li>
                                <a href="apps-email-inbox.html"
                                    class="pl-[52.8px] pr-6 py-[6.4px] block text-[13px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Inbox</a>
                            </li>
                            <li>
                                <a href="apps-email-read.html"
                                    class="pl-[52.8px] pr-6 py-[6.4px] block text-[13px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Read
                                    Email</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear nav-menu pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <span data-key="t-apps">Invoices</span>
                        </a>
                        <ul>
                            <li>
                                <a href="apps-invoices-list.html"
                                    class="pl-[52.8px] pr-6 py-[6.4px] block text-[13px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Invoice
                                    List</a>
                            </li>
                            <li>
                                <a href="apps-invoices-detail.html"
                                    class="pl-14 pr-4  py-2 block text-[13px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Invoice
                                    Detail</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="block py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear nav-menu pl-[52.8px] hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <span data-key="t-apps">Contacts</span>
                        </a>
                        <ul>
                            <li>
                                <a href="apps-contacts-grid.html"
                                    class="pl-[52.8px] pr-6 py-[6.4px] block text-[13px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">User
                                    Grid</a>
                            </li>
                            <li>
                                <a href="apps-contacts-list.html"
                                    class="pl-14 pr-4  py-2 block text-[13px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">User
                                    List</a>
                            </li>
                            <li>
                                <a href="apps-contacts-profile.html"
                                    class="pl-14 pr-4  py-2 block text-[13px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Profile</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" aria-expanded="false"
                            class="flex items-center justify-between py-[6.4px] pr-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear  pl-[52.8px] pr-6 hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                            <span data-key="t-apps">Blog</span>
                            <span
                                class="px-2 py-0.5 font-medium text-red-400 rounded-full bg-red-50 text-10 badge text-end group-data-[sidebar-size=sm]:hidden">New</span>
                        </a>
                        <ul>
                            <li>
                                <a href="apps-blog-grid.html"
                                    class="pl-[52.8px] pr-6 py-[6.4px] block text-[13px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Blog
                                    Grid</a>
                            </li>
                            <li>
                                <a href="apps-blog-list.html"
                                    class="pl-14 pr-4  py-2 block text-[13px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Blog
                                    List</a>
                            </li>
                            <li>
                                <a href="apps-blog-detail.html"
                                    class="pl-14 pr-4  py-2 block text-[13px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Blog
                                    Details</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>


            <li>
                <a href="javascript: void(0);" aria-expanded="false"
                    class="block :rtl:pr-10 py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear nav-menu hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                    <i data-feather="users" fill="#545a6d33"></i>
                    <span data-key="t-auth">Authentication</span>
                </a>
                <ul>
                    <li>
                        <a href="login.html"
                            class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Login</a>
                    </li>
                    <li>
                        <a href="register.html"
                            class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Register</a>
                    </li>
                    <li>
                        <a href="recoverpw.html"
                            class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Recover
                            Password</a>
                    </li>
                    <li>
                        <a href="lock-screen.html"
                            class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Lock
                            Screen</a>
                    </li>
                    <li>
                        <a href="logout.html"
                            class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Log
                            Out</a>
                    </li>
                    <li>
                        <a href="confirm-mail.html"
                            class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Confirm
                            Mail</a>
                    </li>
                    <li>
                        <a href="email-verification.html"
                            class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Email
                            Verification</a>
                    </li>
                    <li>
                        <a href="two-step-verification.html"
                            class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Two
                            Step Verification</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" aria-expanded="false"
                    class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear nav-menu hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                    <i data-feather="briefcase" fill="#545a6d33"></i><span data-key="t-pages">Pages</span>
                </a>
                <ul>
                    <li>
                        <a href="starter.html"
                            class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Starter
                            Page</a>
                    </li>
                    <li>
                        <a href="maintenance.html"
                            class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Maintenance</a>
                    </li>
                    <li>
                        <a href="coming-soon.html"
                            class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Coming
                            Soon</a>
                    </li>
                    <li>
                        <a href="timeline.html"
                            class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Timeline</a>
                    </li>
                    <li>
                        <a href="faqs.html"
                            class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">FAQs</a>
                    </li>
                    <li>
                        <a href="pricing.html"
                            class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Pricing</a>
                    </li>
                    <li>
                        <a href="404.html"
                            class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Error
                            404</a>
                    </li>
                    <li>
                        <a href="500.html"
                            class="pl-[52.8px] pr-6 py-[6.4px] block text-[13.5px] font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">Error
                            500</a>
                    </li>
                </ul>
            </li>
            {{-- <li class="px-5 py-3 mt-2 text-xs font-medium text-gray-500 cursor-default leading-[18px] group-data-[sidebar-size=sm]:hidden"
                data-key="t-elements">Elements</li> --}}
        </ul>
        {{-- <div class="mx-6 my-12 text-center sidebar-alert">
            <div class="rounded card-body bg-primary bg-violet-50/50 dark:bg-zinc-700/60">
                <img src="data:image/png;base64,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"
                    alt="" class="block mx-auto">
                <div class="mt-4">
                    <h5 class="mb-3 text-16 font-medium text-violet-500">Unlimited Access</h5>
                    <p class="text-slate-600 text-13 dark:text-gray-50">Upgrade your plan from a Free trial, to
                        select ‘Business Plan’.</p>
                    <a href="#!" class="mt-6 text-white border-transparent btn bg-violet-500">Upgrade
                        Now</a>
                </div>
            </div>
        </div> --}}
    </div>
    <!-- Sidebar -->
</div>
