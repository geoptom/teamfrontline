<?php
namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {

        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Category::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $categories = [
            [
                'name'              => 'Critical Power',
                'icon'              => 'fa-solid fa-bolt',
                'short_description' => 'Critical Power solutions are designed to ensure continuous, reliable energy for your mission-critical infrastructure. From advanced UPS systems to integrated battery banks and solar backups, we protect your business from interruptions, downtime, and power anomalies.',
                'description'       => 'Effective power continuity is essential in today’s data-driven environments. Our Critical Power portfolio covers everything from Uninterruptible Power Supplies (UPS) and DC power systems to distribution panels, monitoring tools, and solar energy integration. Whether for data centers, industrial facilities, or office setups, we deliver scalable solutions that maintain uptime, stabilize performance, and protect sensitive equipment from voltage variations. Combined with smart monitoring and redundant architecture, our systems offer reliability that drives 24x7 operations and long-term sustainability.',
                'children'          => [
                    [
                        'name'              => 'Uninterruptible Power Supplies (UPS)',
                        'short_description' => 'Ensure uninterrupted power with advanced UPS systems designed to protect hardware from outages and spikes.',
                        'description'       => 'UPS systems provide immediate backup power during electrical disruptions, protecting sensitive equipment from damage and data loss. Our UPS range includes standby and online systems suitable for small businesses to enterprise-level data centers.',
                    ],
                    [
                        'name'              => 'DC Power Systems',
                        'short_description' => 'Efficient DC power systems tailored for telecom, industrial, and battery charging applications.',
                        'description'       => 'Our DC power systems convert and regulate direct current supply to ensure reliable energy for telecom and industrial devices. Designed for efficiency and reliability, these systems extend equipment life and reduce downtime.',
                    ],
                    [
                        'name'              => 'Power Distribution',
                        'short_description' => 'Robust power distribution infrastructure for safe, reliable electrical management across facilities.',
                        'description'       => 'Power distribution units and panels help manage electrical supply within your facility, providing circuit protection, load balancing, and compliance with safety standards, ensuring operational continuity.',
                    ],
                    [
                        'name'              => 'Industrial AC and DC Systems',
                        'short_description' => 'Heavy-duty AC/DC power systems engineered for demanding industrial environments.',
                        'description'       => 'Industrial AC and DC systems deliver stable electricity under extreme conditions. These reliable power sources support manufacturing plants, process industries, and other industrial facilities with high availability.',
                    ],
                    [
                        'name'              => 'Static Transfer Switches',
                        'short_description' => 'Seamless switching between power sources to maintain continuous supply without disruption.',
                        'description'       => 'Static Transfer Switches provide automatic transfer between primary and backup power sources, preventing interruptions and protecting equipment in critical applications such as data centers and hospitals.',
                    ],
                    [
                        'name'              => 'Power Control & Monitoring',
                        'short_description' => 'Advanced systems for real-time power quality monitoring and energy management.',
                        'description'       => 'Power control and monitoring solutions enable constant oversight of electrical parameters, helping reduce waste, identify issues early, and maintain system efficiency and safety through automated alerts and reporting.',
                    ],
                    [
                        'name'              => 'Solar Power',
                        'short_description' => 'Integrated renewable solar power solutions to reduce energy costs and carbon footprint.',
                        'description'       => 'Our solar power offerings combine photovoltaic technology and hybrid systems to provide sustainable, cost-effective energy sources that enhance energy security and support environmental initiatives.',
                    ],
                    [
                        'name'              => 'Batteries & Inverters',
                        'short_description' => 'Trusted batteries and inverters from leading brands ensuring reliable energy storage and conversion.',
                        'description'       => 'We supply top-tier batteries and inverters from brands like Rocket, Exide, Amaron, Livguard, and Microtek, guaranteeing dependable power backup and efficient DC to AC conversion for diverse applications.',
                    ],
                ],
            ],

            [
                'name'              => 'Thermal Management',
                'icon'              => 'fa-solid fa-temperature-high',
                'short_description' => 'Thermal Management solutions provide intelligent, energy-efficient cooling tailored for critical IT and industrial systems.',
                'description'       => 'Maintaining optimal temperature and humidity values is vital for IT equipment longevity and reliability. Our Thermal Management offerings encompass liquid cooling, enclosure cooling, room and rack cooling, chillers, and advanced control systems designed to optimize thermal regulation while reducing energy consumption and operational costs.',
                'children'          => [
                    [
                        'name'              => 'Liquid Cooling Solutions',
                        'short_description' => 'Innovative liquid cooling to efficiently dissipate heat in high-performance IT environments.',
                        'description'       => 'Liquid cooling solutions provide superior thermal management by directly targeting heat sources, reducing noise and improving energy efficiency, especially in high-density data centers and industrial applications.',
                    ],
                    [
                        'name'              => 'Enclosure Cooling',
                        'short_description' => 'Dedicated cooling solutions designed for equipment enclosures and cabinets.',
                        'description'       => 'Our enclosure cooling systems maintain stable temperatures inside cabinets and racks, mitigating the risk of thermal overload and improving equipment reliability.',
                    ],
                    [
                        'name'              => 'Heat Rejection',
                        'short_description' => 'Systems optimized to efficiently expel unwanted heat from critical spaces.',
                        'description'       => 'Heat rejection units and cooling towers are designed to transfer excess heat from chilled liquid loops to the environment, supporting cooling infrastructure in large facilities.',
                    ],
                    [
                        'name'              => 'Room Cooling',
                        'short_description' => 'Complete room-level cooling solutions for server rooms and data centers.',
                        'description'       => 'Room cooling delivers conditioned air throughout IT rooms, optimizing airflow and temperature, reducing hotspots, and maintaining operational integrity of sensitive equipment.',
                    ],
                    [
                        'name'              => 'In-Row Cooling',
                        'short_description' => 'Proximity cooling located within rows of racks to target heat spots effectively.',
                        'description'       => 'In-row cooling units are placed between racks to provide focused cooling, improving efficiency by reducing the distance chilled air must travel.',
                    ],
                    [
                        'name'              => 'Rack Cooling',
                        'short_description' => 'Direct cooling solutions integrated within server racks.',
                        'description'       => 'Rack-level cooling solutions address heat generation at the source, often using rear door heat exchangers or contained cooling aisles to improve system reliability.',
                    ],
                    [
                        'name'              => 'Free Cooling Chillers',
                        'short_description' => 'Energy-efficient chillers exploiting ambient conditions to reduce cooling costs.',
                        'description'       => 'Free cooling chillers use external air or water conditions to supplement mechanical cooling, transforming how large facilities manage temperature with a lower carbon footprint.',
                    ],
                    [
                        'name'              => 'Evaporative Free Cooling',
                        'short_description' => 'Eco-friendly cooling combining evaporative technology with traditional systems for added efficiency.',
                        'description'       => 'Evaporative free cooling leverages natural evaporative processes to cool air before it reaches sensitive equipment, optimizing energy usage and cooling capacity.',
                    ],
                    [
                        'name'              => 'Thermal Control and Monitoring',
                        'short_description' => 'Smart control systems delivering precise thermal regulation and remote monitoring.',
                        'description'       => 'Our thermal management platforms integrate sensors, control units, and software to monitor and adjust temperature in real-time, ensuring system health and protection.',
                    ],
                ],
            ],

            [
                'name'              => 'Racks & Enclosures',
                'icon'              => 'fa-solid fa-server',
                'short_description' => 'Durable racks and enclosures designed to house and protect your IT hardware with optimal airflow and security.',
                'description'       => 'Racks & Enclosures offer the backbone infrastructure for organizing and securing servers, storage, and network equipment. Offered in various sizes and forms—including outdoor cabinets and integrated containment solutions—they facilitate efficient cable management, thermal management, and physical security for enterprise deployments.',
                'children'          => [
                    [
                        'name'              => 'Integrated Solutions',
                        'short_description' => 'Customizable integrated rack systems combining multiple infrastructure components.',
                        'description'       => 'Integrated Solutions are pre-engineered rack systems that include power, cooling, and cabling alongside structured hardware placement, reducing deployment time and increasing scalability.',
                    ],
                    [
                        'name'              => 'Racks & Containment',
                        'short_description' => 'Modular racks with containment features for airflow and environmental control.',
                        'description'       => 'Racks equipped with containment solutions promote hot and cold aisle separation, improving cooling efficiency and reducing energy expenses in data centers.',
                    ],
                    [
                        'name'              => 'Outdoor Enclosures',
                        'short_description' => 'Weatherproof enclosures designed for outdoor and industrial IT deployments.',
                        'description'       => 'Outdoor Enclosures protect sensitive IT equipment from environmental hazards such as dust, moisture, and temperature fluctuations, enabling deployments in challenging locations.',
                    ],
                ],
            ],

            [
                'name'              => 'Monitoring & Management',
                'icon'              => 'fa-solid fa-chart-line',
                'short_description' => 'Comprehensive tools for monitoring and managing IT infrastructure ensuring uptime and operational efficiency.',
                'description'       => 'Our Monitoring & Management suite centralizes oversight of network devices, servers, and infrastructure through real-time analytics, embedded device management, and secure KVM solutions. This enables IT admins to proactively address issues before failure and optimize system health across complex environments.',
                'children'          => [
                    [
                        'name'              => 'Digital Infrastructure Solutions',
                        'short_description' => 'Full-stack digital infrastructure monitoring for enterprise-grade IT management.',
                        'description'       => 'These solutions provide 24/7 visibility into infrastructure performance metrics, capacity planning, and fault detection through intuitive dashboards.',
                    ],
                    [
                        'name'              => 'Embedded Device Management',
                        'short_description' => 'Centralized management of embedded controllers and devices across facilities.',
                        'description'       => 'Embedded device management integrates networked devices into a cohesive management system, allowing firmware updates, configuration, and troubleshooting remotely.',
                    ],
                    [
                        'name'              => 'Serial Console',
                        'short_description' => 'Secure console access for managing serial connected network and server devices.',
                        'description'       => 'Serial consoles enable administrators to access devices at a low level, facilitating management in maintenance mode or during outages.',
                    ],
                    [
                        'name'              => 'IP KVM Switches',
                        'short_description' => 'Remote KVM switches providing keyboard, video, and mouse control over IP networks.',
                        'description'       => 'IP KVM switches grant secure, remote access to multiple servers reducing the need for physical presence and enhancing IT operational flexibility.',
                    ],
                    [
                        'name'              => 'High Performance KVM',
                        'short_description' => 'Low latency, high resolution KVM switches designed for demanding IT environments.',
                        'description'       => 'High performance KVM devices ensure crisp video and reliable user experience over IP in latency-sensitive applications.',
                    ],
                    [
                        'name'              => 'LCD Tray',
                        'short_description' => 'Rack-mounted LCD trays with integrated keyboard and mouse for local server control.',
                        'description'       => 'LCD trays provide compact on-site management consoles, streamlining server access and reducing IT overhead.',
                    ],
                    [
                        'name'              => 'Desktop KVM and KMSecure KVM Software Monitoring',
                        'short_description' => 'Software and desktop KVM solutions for flexible device management and security monitoring.',
                        'description'       => 'These products offer seamless integration for end-user device management and secure software-based KVM control for enterprise endpoints.',
                    ],
                ],
            ],

            [
                'name'              => 'Servers & Storage',
                'icon'              => 'fa-solid fa-database',
                'short_description' => 'High-performance servers and scalable storage solutions designed for enterprise data processing and backup.',
                'description'       => 'Our Servers & Storage portfolio offers a wide range of rack, blade, and tower servers combined with resilient NAS/SAN storage and backup solutions. Designed to support virtualization, analytics, and mission-critical applications, these offerings ensure data integrity, speed, and availability to empower business continuity.',
                'children'          => [
                    [
                        'name'              => 'Rack Servers',
                        'short_description' => 'Compact, scalable rack servers to power your data center infrastructure.',
                        'description'       => 'Rack servers provide dense compute power in modular form factors, optimized for high availability and ease of maintenance.',
                    ],
                    [
                        'name'              => 'Tower Servers',
                        'short_description' => 'Flexible tower servers suitable for small to medium business deployments.',
                        'description'       => 'Tower servers deliver reliable computing with quiet operation, suited for branch offices and growing enterprises.',
                    ],
                    [
                        'name'              => 'Blade Servers',
                        'short_description' => 'Modular blade servers delivering high density and energy-efficient performance.',
                        'description'       => 'Blade servers maximize data center space and power efficiency with shared resources in chassis architectures.',
                    ],
                    [
                        'name'              => 'Storage (NAS / SAN)',
                        'short_description' => 'Robust network-attached and storage area solutions for data-intensive environments.',
                        'description'       => 'NAS and SAN storage infrastructures provide high-speed access and scalable capacity essential for large datasets, virtualization, and backups.',
                    ],
                    [
                        'name'              => 'Backup Solutions',
                        'short_description' => 'Comprehensive backup systems for data protection and disaster recovery.',
                        'description'       => 'Backup solutions range from on-premise primary backups to integrated cloud disaster recovery, ensuring your data is safe and readily available.',
                    ],
                ],
            ],

            [
                'name'              => 'Desktops & Laptops',
                'icon'              => 'fa-solid fa-laptop',
                'short_description' => 'Reliable, high-performance desktops and laptops tailored for business and professional needs.',
                'description'       => 'Our Desktops & Laptops selection covers business desktops, powerful workstations, thin clients, and high-performance laptops for gaming and specialized applications. Designed to enhance user productivity and flexibility, they come from trusted brands and support varied work environments, from office tasks to demanding design workloads.',
                'children'          => [
                    [
                        'name'              => 'Business Desktops',
                        'short_description' => 'Cost-effective, reliable desktops for everyday business applications.',
                        'description'       => 'Business desktops focus on performance, security, and manageability, perfect for standard office tasks and enterprise environments.',
                    ],
                    [
                        'name'              => 'Workstations',
                        'short_description' => 'High-power workstations engineered for intensive professional workloads.',
                        'description'       => 'Workstations are configured for 3D CAD, video editing, data analysis and scientific computing, delivering maximum GPU and CPU performance.',
                    ],
                    [
                        'name'              => 'Thin Clients',
                        'short_description' => 'Lightweight, secure thin clients for centralized computing.',
                        'description'       => 'Thin clients connect to virtual desktop infrastructure, offering ease of management and enhanced security suitable for call centers and hospitals.',
                    ],
                    [
                        'name'              => 'Business Laptops',
                        'short_description' => 'Portable laptops offering balance of power and mobility for professionals.',
                        'description'       => 'Business laptops provide strong processing, long battery life, and enterprise-grade security, enabling efficient remote and onsite work.',
                    ],
                    [
                        'name'              => 'Gaming / Performance Laptops',
                        'short_description' => 'High-end laptops designed for performance-intensive gaming and creative tasks.',
                        'description'       => 'These laptops combine powerful CPUs, dedicated GPUs, and high-refresh-rate displays to support gaming, streaming, and multimedia production.',
                    ],
                ],
            ],

            [
                'name'              => 'Networking Solutions',
                'icon'              => 'fa-solid fa-network-wired',
                'short_description' => 'Complete networking products and services to ensure secure, reliable connectivity.',
                'description'       => 'Our Networking Solutions encompass routers, switches, firewalls, Wi-Fi access points, and structured cabling products. Built to support enterprise-scale connectivity, these solutions include equipment from Cisco, Tacitine, and others, ensuring high performance, security, and scalability for diverse environments.',
                'children'          => [
                    [
                        'name'              => 'Routers',
                        'short_description' => 'High-performance routers for secure and scalable network routing.',
                        'description'       => 'Routers manage data traffic across complex networks, providing reliable connectivity and advanced security controls. We supply models tailored for enterprises and service providers.',
                    ],
                    [
                        'name'              => 'Cisco',
                        'short_description' => 'Industry-leading networking hardware and software solutions by Cisco.',
                        'description'       => 'Cisco products are known for robustness and innovation, offering versatile routing, switching, and cybersecurity solutions.',
                    ],
                    [
                        'name'              => 'Tacitine',
                        'short_description' => 'Specialized networking equipment solutions by Tacitine for modern enterprises.',
                        'description'       => 'Tacitine offers cutting-edge network infrastructure devices designed for flexibility, performance, and integration across enterprise networks.',
                    ],
                    [
                        'name'              => 'Switches',
                        'short_description' => 'Enterprise-grade switches for efficient data distribution across networks.',
                        'description'       => 'Switches provide seamless packet forwarding within local networks and are essential for network segmentation and performance optimization.',
                    ],
                    [
                        'name'              => 'Firewalls',
                        'short_description' => 'Advanced firewall solutions protecting networks against cyber threats.',
                        'description'       => 'Our firewall offerings safeguard network perimeters with intrusion detection, VPN support, and automated threat prevention.',
                    ],
                    [
                        'name'              => 'Wi-Fi Access Points',
                        'short_description' => 'Reliable wireless access points delivering fast and secure connectivity.',
                        'description'       => 'Designed for enterprise environments, our Wi-Fi access points ensure wide coverage, multiple user support, and robust security.',
                    ],
                    [
                        'name'              => 'Structured Cabling',
                        'short_description' => 'Professional cabling solutions that organize and support IT infrastructure.',
                        'description'       => 'Structured cabling systems provide a platform for network and communication technologies with standards-based design and scalability.',
                    ],
                ],
            ],

            [
                'name'              => 'Cloud & IT Services',
                'icon'              => 'fa-solid fa-cloud',
                'short_description' => 'Flexible cloud services and IT consulting to accelerate digital transformation.',
                'description'       => 'We support businesses in adopting cloud technologies including mail & collaboration platforms, cloud backup, and IT consulting services. Our cloud solutions help improve agility, reduce costs, and secure critical data while enabling seamless teamwork.',
                'children'          => [
                    [
                        'name'              => 'Cloud Mail & Collaboration',
                        'short_description' => 'Cloud-based mailing and collaboration tools for productive teamwork.',
                        'description'       => 'Cloud mail services facilitate reliable, secure email communication while collaboration platforms support shared document editing, project management, and video conferencing.',
                    ],
                    [
                        'name'              => 'Netcore',
                        'short_description' => 'Netcore email and cloud collaboration software solutions.',
                        'description'       => 'Netcore provides scalable communication solutions with integrated cloud services tailored for enterprise needs.',
                    ],
                    [
                        'name'              => 'Cloud Backup',
                        'short_description' => 'Secure cloud backup solutions for data protection and disaster recovery.',
                        'description'       => 'Cloud backup services automatically protect data off-site with scalable storage and quick recovery options to minimize downtime.',
                    ],
                    [
                        'name'              => 'IT Consulting',
                        'short_description' => 'Expert IT consulting services to design and implement technology solutions.',
                        'description'       => 'Our consulting teams analyze business needs to recommend and deploy strategic technologies that enhance operations, security, and compliance.',
                    ],
                ],
            ],

            [
                'name'              => 'Peripherals & Accessories',
                'icon'              => 'fa-solid fa-keyboard',
                'short_description' => 'Wide range of peripherals and accessories enhancing your IT environment.',
                'description'       => 'Complete your IT setup with our wide selection of peripherals, including printers, scanners, monitors, input devices, and external storage. Each product is chosen to improve productivity, convenience, and compatibility within modern workspaces.',
                'children'          => [
                    [
                        'name'              => 'Printers & Scanners',
                        'short_description' => 'Reliable printing and scanning devices for office productivity.',
                        'description'       => 'Our printers and scanners provide high-quality output and versatile functionality, supporting various document management needs for businesses.',
                    ],
                    [
                        'name'              => 'Keyboards & Mice',
                        'short_description' => 'Ergonomic keyboards and precision mice designed for comfort and efficiency.',
                        'description'       => 'We supply professional-grade input devices that enhance user productivity while reducing strain during extended use.',
                    ],
                    [
                        'name'              => 'Monitors',
                        'short_description' => 'High-resolution monitors offering vibrant displays for various tasks.',
                        'description'       => 'Our monitors deliver crisp visuals with multiple size and resolution options, ideal for creative work, analysis, and everyday computing.',
                    ],
                    [
                        'name'              => 'External Drives',
                        'short_description' => 'Portable and high-capacity external storage solutions.',
                        'description'       => 'External drives provide flexible data transport and backup options, ensuring critical data is accessible yet securely stored.',
                    ],
                ],
            ],
        ];

        // $categories = [
        //     [
        //         'name' => 'Critical Power',
        //         'icon' => 'fa-solid fa-bolt',
        //         'short_description'=> ' Critical Power solutions are designed to ensure continuous, reliable energy for your mission-critical infrastructure. From advanced UPS systems to integrated battery banks and solar backups, we protect your business from interruptions, downtime, and power anomalies that could affect operations or safety.',
        //         'description' => 'Effective power continuity is essential in today’s data-driven environments. Our Critical Power portfolio covers everything from Uninterruptible Power Supplies (UPS) and DC power systems to distribution panels, monitoring tools, and solar energy integration. Whether for data centers, industrial facilities, or office setups, we deliver scalable solutions that maintain uptime, stabilize performance, and protect sensitive equipment from voltage variations. Combined with smart monitoring and redundant architecture, our systems offer reliability that drives 24x7 operations and long-term sustainability.',
        //         'children' => [
        //             ['name' => 'Uninterruptible Power Supplies (UPS)'],
        //             ['name' => 'DC Power Systems'],
        //             ['name' => 'Power Distribution'],
        //             ['name' => 'Industrial AC and DC Systems'],
        //             ['name' => 'Static Transfer Switches'],
        //             ['name' => 'Power Control & Monitoring'],
        //             ['name' => 'Solar Power'],
        //             [
        //                 'name' => 'Batteries & Inverters',
        //                 'children' => [
        //                     ['name' => 'Rocket'],
        //                     ['name' => 'Exide'],
        //                     ['name' => 'Amaron'],
        //                     ['name' => 'Livguard'],
        //                     ['name' => 'Microtek'],
        //                 ],
        //             ],
        //         ],
        //     ],

        //     [
        //         'name' => 'Thermal Management',
        //         'icon' => 'fa-solid fa-temperature-high',
        //         'short_description'=> 'Thermal Management solutions provide intelligent, efficient cooling for IT spaces of all sizes. Using advanced liquid, in-row, and free cooling technology, our systems reduce energy waste and guarantee ideal thermal conditions for critical electronic and data assets.',
        //         'description' => 'Thermal Management is crucial for maintaining stable operating conditions across data centers, server rooms, and industrial systems. We offer a complete range of thermal control solutions—from high-capacity chillers and liquid cooling systems to room and rack-level temperature optimization. Each system is engineered to reduce operational costs while extending equipment life. Using smart controls and energy-efficient designs, our cooling systems ensure balanced temperature distribution, humidity regulation, and reliable heat rejection, even in high-density setups. These innovations help sustain system uptime while aligning with modern energy sustainability goals.',
        //         'children' => [
        //             ['name' => 'Liquid Cooling Solutions'],
        //             ['name' => 'Enclosure Cooling'],
        //             ['name' => 'Heat Rejection'],
        //             ['name' => 'Room Cooling'],
        //             ['name' => 'In-Row Cooling'],
        //             ['name' => 'Rack Cooling'],
        //             ['name' => 'Free Cooling Chillers'],
        //             ['name' => 'Evaporative Free Cooling'],
        //             ['name' => 'Thermal Control and Monitoring'],
        //         ],
        //     ],

        //     [
        //         'name' => 'Racks & Enclosures',
        //         'icon' => 'fa-solid fa-server',
        //         'short_description'=> 'Our Racks & Enclosures deliver reliability and structure to your IT ecosystem. Designed for scalability, safety, and airflow efficiency, they provide the backbone for servers, storage, and power systems in both indoor and outdoor environments.',
        //         'description' => 'A stable, secure enclosure is the foundation of any high-performing IT setup. Our solutions include integrated systems, rack containment, and outdoor cabinets that support flexibility in different environments—from compact office networks to large enterprise data centers. Built with premium materials and precision design, these enclosures protect equipment from environmental and mechanical risks, streamline cable management, and optimize cooling efficiency. Whether you need a small rack for branch offices or customized enclosures for mission-critical facilities, we deliver modular solutions that scale easily with your business growth.',
        //         'children' => [
        //             ['name' => 'Integrated Solutions'],
        //             ['name' => 'Racks & Containment'],
        //             ['name' => 'Outdoor Enclosures'],
        //         ],
        //     ],

        //     [
        //         'name' => 'Monitoring & Management',
        //         'icon' => 'fa-solid fa-chart-line',
        //         'short_description'=> 'Monitoring & Management tools give you full visibility and control over IT infrastructure, ensuring optimized performance, security, and uptime. From KVM switches to embedded management systems, we help you stay connected and informed at all times.',
        //         'description' => 'Our Monitoring & Management solutions unify oversight of diverse hardware and software assets. Through integrated dashboards and intelligent sensor feedback, administrators can monitor device health, automate maintenance, and address issues remotely. Products include IP KVM switches, LCD trays, serial consoles, and embedded device management platforms that streamline control in data centers and enterprise environments. Robust analytics tools also provide insights into capacity trends and efficiency patterns, empowering proactive planning and superior uptime management across digital operations.',
        //         'children' => [
        //             ['name' => 'Digital Infrastructure Solutions'],
        //             ['name' => 'Embedded Device Management'],
        //             ['name' => 'Serial Console'],
        //             ['name' => 'IP KVM Switches'],
        //             ['name' => 'High Performance KVM'],
        //             ['name' => 'LCD Tray'],
        //             ['name' => 'Desktop KVM and KMSecure KVM Software Monitoring'],
        //         ],
        //     ],

        //     [
        //         'name' => 'Servers & Storage',
        //         'icon' => 'fa-solid fa-database',
        //         'short_description'=> 'Servers & Storage solutions combine cutting-edge performance with resilient data protection. Our offerings include rack, blade, and tower servers plus scalable NAS, SAN, and backup systems that power today’s business-critical applications.',
        //         'description' => 'Modern enterprises need infrastructure that scales effortlessly with their workloads. Our Servers & Storage range brings together best-in-class compute and data management technology to handle mission-critical operations. Rack and tower servers provide robust processing for virtualization and analytics, while network-attached and storage area solutions ensure high-speed, redundant data availability. With integrated backup and disaster recovery capabilities, our systems minimize downtime and data loss, supporting long-term continuity and performance for small businesses and large enterprises alike.',
        //         'children' => [
        //             [
        //                 'name' => 'Rack Servers',
        //             ],
        //             ['name' => 'Tower Servers'],
        //             ['name' => 'Blade Servers'],
        //             ['name' => 'Storage (NAS / SAN)'],
        //             ['name' => 'Backup Solutions'],
        //         ],
        //     ],

        //     [
        //         'name' => 'Desktops & Laptops',
        //         'icon' => 'fa-solid fa-laptop',
        //         'short_description'=> 'Our Desktops & Laptops portfolio offers business-grade reliability, mobility, and performance. From workstations and thin clients to gaming and productivity laptops, we deliver technology tailored to every professional’s environment.',
        //         'description' => 'Empower your workforce with advanced computing devices optimized for corporate and creative use cases. Our range includes business desktops, engineering workstations, lightweight thin clients, and high-performance laptops from leading global brands. Each device ensures seamless multitasking, vivid displays, strong security, and ergonomic efficiency. Whether deployed at offices or for remote teams, these systems support your business productivity through dependable hardware and modern design features built for speed and stability.',
        //         'children' => [
        //             [
        //                 'name' => 'Business Desktops',
        //             ],
        //             ['name' => 'Workstations'],
        //             ['name' => 'Thin Clients'],
        //             ['name' => 'Business Laptops'],
        //             ['name' => 'Gaming / Performance Laptops'],
        //         ],
        //     ],

        //     [
        //         'name' => 'Networking Solutions',
        //         'icon' => 'fa-solid fa-network-wired',
        //         'short_description'=> 'Networking Solutions connect, protect, and enhance your digital ecosystem. From routers and firewalls to structured cabling and Wi-Fi systems, we keep your network secure and scalable for evolving business demands.',
        //         'description' => 'A robust network is the core of every digital enterprise. We provide comprehensive Networking Solutions featuring routers, managed switches, firewalls, access points, and cabling infrastructure built to deliver performance, reliability, and safety. Partnering with leading brands like Cisco and Tacitine, we design architectures that ensure seamless data flow, improved bandwidth utilization, and advanced threat protection. These systems are scalable for enterprises, campuses, and industrial applications—supporting today’s connectivity-driven workplaces with next-gen resilience.',
        //         'children' => [
        //             [
        //                 'name' => 'Routers',
        //                 'children' => [
        //                     ['name' => 'Cisco'],
        //                     ['name' => 'Tacitine'],
        //                 ],
        //             ],
        //             ['name' => 'Switches'],
        //             ['name' => 'Firewalls'],
        //             ['name' => 'Wi-Fi Access Points'],
        //             ['name' => 'Structured Cabling'],
        //         ],
        //     ],

        //     [
        //         'name' => 'Cloud & IT Services',
        //         'icon' => 'fa-solid fa-cloud',
        //         'short_description'=> 'Cloud & IT Services enable your business to work smarter, collaborate better, and scale faster. With secure cloud backups, consulting, and email collaboration tools, we help you embrace digital transformation with confidence.',
        //         'description' => 'Our Cloud & IT Services assist organizations in reimagining infrastructure by moving workloads to the cloud and modernizing IT operations. Solutions include cloud-based mailing and collaboration suites, secure backup and recovery platforms, and expert consultancy for hybrid environments. Whether deploying private, public, or hybrid models, we focus on reliability, compliance, and cost-efficiency. Through strategic partnerships with trusted providers, we ensure seamless integration, scalable resources, and real-time accessibility for your workforce—unlocking agility and long-term business continuity.',
        //         'children' => [
        //             [
        //                 'name' => 'Cloud Mail & Collaboration',
        //                 'children' => [
        //                     ['name' => 'Netcore'],
        //                 ],
        //             ],
        //             ['name' => 'Cloud Backup'],
        //             ['name' => 'IT Consulting'],
        //         ],
        //     ],

        //     [
        //         'name' => 'Peripherals & Accessories',
        //         'icon' => 'fa-solid fa-keyboard',
        //         'short_description'=> 'Peripherals & Accessories enhance productivity and create seamless work experiences. From printers and scanners to monitors, keyboards, mice, and storage drives, our selection supports every modern workspace need.',
        //         'description' => 'Maximize your hardware potential with our wide range of accessories and peripheral products designed for performance and comfort. We supply professional-grade monitors for high-resolution clarity, ergonomic input devices for precision, and reliable printers and scanners for operational efficiency. External storage drives and connectivity solutions further complete your setup, ensuring compatibility and effortless expansion. Whether you’re configuring individual desks or entire office environments, our peripheral range keeps your business connected, efficient, and future-ready.',
        //         'children' => [
        //             [
        //                 'name' => 'Printers & Scanners',
        //             ],
        //             ['name' => 'Keyboards & Mice'],
        //             ['name' => 'Monitors'],
        //             ['name' => 'External Drives'],
        //         ],
        //     ],
        // ];

        $this->createCategories($categories);
    }

    private function createCategories(array $categories, $parentId = null)
    {
        foreach ($categories as $categoryData) {
            $children = $categoryData['children'] ?? [];
            unset($categoryData['children']);

            $category = Category::create([
                'name'              => $categoryData['name'],
                'parent_id'         => $parentId,
                'short_description' => $categoryData['short_description'] ?? null,
                'description'       => $categoryData['description'] ?? null,
                'status'            => 1,
                'icon'              => $categoryData['icon'] ?? "assets/img/shape/no-image.png",
                'banner'            => "assets/img/hero/hero_bg_1_4.jpg",
            ]);

            if (! empty($children)) {
                $this->createCategories($children, $category->id);
            }
        }
    }
}
