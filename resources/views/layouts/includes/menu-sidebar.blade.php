<div class="sidebar-content">
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-item {{ request()->is('painel') || request()->is('painel/dashboard') ? 'active' : null }}">
                <a href="{{ route('painel.dashboard.index') }}">
                    <i class="ik ik-bar-chart-2"></i>
                    <span>Dashboard</span>
                </a>
            </div>            
            <div
                class="nav-item has-sub {{ request()->is('painel/clientes') || request()->is('painel/curstomers/*') ? 'active open' : null }}">
                <a href="javascript:void(0)">
                    <i class="fas fa-users"></i><span>Clientes</span>
                </a>
                <div class="submenu-content">
                    <a href="{{ route('painel.customers.index') }}"
                        class="menu-item {{ request()->is('painel/clientes') || Route::is('customers.show') ? 'active' : null }}">Gerenciar
                        Clientes</a>
                </div>
                <div class="submenu-content">
                    <a href="" class="menu-item">Contratos</a>
                </div>
            </div>
            <div
                class="nav-item has-sub {{ request()->is('painel/leads') || request()->is('painel/leads/*') ? 'active open' : null }}">
                <a href="javascript:void(0)">
                    <i class="fas fa-store"></i><span>Leads</span>
                </a>
                <div class="submenu-content">
                    <a href="{{ route('painel.leads.index') }}"
                        class="menu-item {{ request()->is('painel/leads') || Route::is('painel.leads.show') ? 'active' : null }}">Gerenciar
                        Leads</a>
                </div>
                <div class="submenu-content">
                    <a href="{{ route('painel.leads.contacts.index') }}"
                        class="menu-item {{ request()->is('painel/leads/contatos') ? 'active' : null }}">Histórico
                        de Contatos</a>
                </div>
                <div class="submenu-content">
                    <a href="{{ route('painel.leads.appointments.index') }}"
                        class="menu-item {{ request()->is('painel/leads/compromissos') ? 'active' : null }}">Compromissos</a>
                </div>
            </div>
            <div class="nav-item {{ request()->is('painel/filiais') ? 'active' : null }}">
                <a href="{{ route('painel.branches.index') }}">
                    <i class="fas fa-user-tie"></i>
                    <span>Filiais</span>
                </a>
            </div>
            <div class="nav-item {{ request()->is('painel/usuarios') ? 'active' : null }}">
                <a href="{{ route('painel.users.index') }}">
                    <i class="fas fa-user-cog"></i>
                    <span>Usuários</span>
                </a>
            </div>
            <div
                class="nav-item has-sub
                    {{ request()->is('painel/origens') || request()->is('painel/origens/*') || request()->is('painel/status') || request()->is('painel/status/*') ? 'active open' : null }}
                ">
                <a href="javascript:void(0)">
                    <i class="fas fa-cogs"></i><span>Configurações</span>
                </a>
                <div class="submenu-content">
                    <a href="{{ route('painel.sources.index') }}"
                        class="menu-item {{ request()->is('painel/origens') || request()->is('painel/origens/*') ? 'active' : null }}">Origens</a>
                </div>
                <div class="submenu-content">
                    <a href="{{ route('painel.status.index') }}"
                        class="menu-item {{ request()->is('painel/status') || request()->is('painel/status/*') ? 'active' : null }}">Status
                        Leads e Clientes</a>
                </div>
            </div>
        </nav>
    </div>
</div>
