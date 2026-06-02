<?php

namespace Database\Seeders;

use App\Enums\CaseStudyStatus;
use App\Models\CaseStudy;
use App\Models\Faq;
use App\Models\Publication;
use App\Models\PublicationType;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class CmsSeeder extends Seeder
{
    public function run(): void
    {
        $services = collect($this->services())
            ->values()
            ->mapWithKeys(function (array $serviceData, int $index): array {
                $service = Service::query()->updateOrCreate(
                    ['title' => $serviceData['title']],
                    [
                        'icon' => $serviceData['icon'],
                        'summary' => $serviceData['summary'],
                        'description' => $this->html($serviceData['description']),
                        'sort_order' => $index + 1,
                        'is_featured' => true,
                        'is_published' => true,
                    ],
                );

                return [$serviceData['title'] => $service];
            });

        collect($this->caseStudies())
            ->values()
            ->each(function (array $caseStudyData, int $index) use ($services): void {
                $service = $services->get($caseStudyData['service']);

                if (! $service instanceof Service) {
                    return;
                }

                CaseStudy::query()->updateOrCreate(
                    ['title' => $caseStudyData['title']],
                    [
                        'service_id' => $service->getKey(),
                        'partner' => $caseStudyData['partner'],
                        'location' => $caseStudyData['location'],
                        'summary' => $caseStudyData['summary'],
                        'content' => $this->caseStudyHtml($caseStudyData['content']),
                        'start_date' => null,
                        'end_date' => null,
                        'status' => CaseStudyStatus::Completed->value,
                        'is_featured' => $index < 3,
                        'is_published' => true,
                    ],
                );
            });

        $publicationTypes = $this->seedPublicationTypes();

        $this->seedPublications($services, $publicationTypes);
        $this->seedFaqs();
    }

    /**
     * @return Collection<string, PublicationType>
     */
    protected function seedPublicationTypes(): Collection
    {
        return collect($this->publicationTypes())
            ->values()
            ->mapWithKeys(function (array $publicationTypeData, int $index): array {
                $publicationType = PublicationType::query()->updateOrCreate(
                    ['name' => $publicationTypeData['name']],
                    [
                        'description' => $publicationTypeData['description'],
                        'action_text' => $publicationTypeData['action_text'],
                        'sort_order' => $index + 1,
                        'is_active' => true,
                    ],
                );

                return [$publicationTypeData['name'] => $publicationType];
            });
    }

    /**
     * @param  Collection<string, Service>  $services
     * @param  Collection<string, PublicationType>  $publicationTypes
     */
    protected function seedPublications(Collection $services, Collection $publicationTypes): void
    {
        collect($this->publications())
            ->values()
            ->each(function (array $publicationData, int $index) use ($services, $publicationTypes): void {
                $publicationType = $publicationTypes->get($publicationData['type']);
                $service = $services->get($publicationData['service']);

                if (! $publicationType instanceof PublicationType) {
                    return;
                }

                Publication::query()->withoutGlobalScopes()->updateOrCreate(
                    ['title' => $publicationData['title']],
                    [
                        'publication_type_id' => $publicationType->getKey(),
                        'service_id' => $service instanceof Service ? $service->getKey() : null,
                        'summary' => $publicationData['summary'],
                        'publication_year' => null,
                        'published_at' => now(),
                        'external_url' => null,
                        'sort_order' => $index + 1,
                        'is_featured' => $index < 2,
                        'is_published' => true,
                    ],
                );
            });
    }

    protected function seedFaqs(): void
    {
        collect($this->faqs())
            ->values()
            ->each(function (array $faqData, int $index): void {
                Faq::query()->withoutGlobalScopes()->updateOrCreate(
                    ['question' => $faqData['question']],
                    [
                        'answer' => $this->html($faqData['answer']),
                        'page' => $faqData['page'],
                        'category' => $faqData['category'],
                        'sort_order' => $index + 1,
                        'is_published' => true,
                        'is_featured' => $index < 6,
                    ],
                );
            });
    }

    /**
     * @return array<int, array{title: string, icon: string, summary: string, description: array<int, string>}>
     */
    protected function services(): array
    {
        return [
            [
                'title' => 'Trade, Investment Climate and Regional Integration',
                'icon' => 'heroicon-o-globe-alt',
                'summary' => 'Policy and institutional reform support for fair trade governance, a stronger investment climate, business environment improvement, and practical regional integration in Nigeria and across Africa.',
                'description' => [
                    <<<'HTML'
The Trade, Investment Climate and Regional Integration programme is concerned with the rules, institutions, incentives, and implementation pathways that determine whether markets can create broad-based development outcomes. The Centre for Trade and Business Environment Advocacy approaches trade policy as more than tariff schedules, border procedures, or formal commitments in regional instruments. The programme treats trade governance as a living system that connects producers, service providers, regulators, legislators, standards institutions, customs authorities, investors, consumers, and communities. Its central concern is how Nigeria and other African economies can use trade and investment reform to expand opportunity, reduce exclusion, and make market participation more predictable for firms of different sizes, especially micro, small, and medium enterprises.
HTML,
                    <<<'HTML'
The programme covers policy and institutional reform relating to trade governance, investment climate, regional integration, business environment reform, and the implementation of national, regional, and continental economic frameworks, including the African Continental Free Trade Area. This means working with the substance of trade commitments as well as the institutional conditions that determine whether those commitments matter in practice. A continental framework can create opportunity, but opportunity is not self-executing. It must be translated into coherent rules, capable institutions, accountable procedures, informed private-sector participation, and reform processes that recognise the political economy of implementation. The Centre for Trade and Business Environment Advocacy therefore examines both the ambition of reform and the constraints that often prevent stated policy goals from becoming real market improvements.
HTML,
                    <<<'HTML'
The programme is research-led. The organisation undertakes in-house research and collaborates with experts, academics, practitioners, and partner institutions to produce evidence that is policy-relevant, analytically sound, and responsive to implementation realities. In the trade and investment climate space, this research may involve mapping policies, laws, regulations, institutional mandates, proposed bills, market practices, and administrative procedures that affect the competitiveness of enterprises. It may also involve identifying inconsistencies between policy objectives and regulatory practice, assessing the distributional consequences of reform options, and clarifying which institutions have the mandate and capacity to move a reform forward. The objective is not research for its own sake. The objective is usable evidence that can support reform conversations, sharpen advocacy, and help stakeholders move from general diagnosis to practical action.
HTML,
                    <<<'HTML'
The Centre for Trade and Business Environment Advocacy brings a public-interest perspective to trade and investment climate questions. Policy debates in this area are often shaped by state institutions, commercial interests, or narrowly framed sectoral advocacy. Those actors are important, but reform processes also require independent analysis that asks whether market rules are fair, whether institutional choices are feasible, whether smaller firms can participate, whether consumers and citizens are protected, and whether reforms advance wider development priorities. This programme fills that gap by combining legal, policy, governance, and political-economy analysis. It pays attention to what a rule says, who must implement it, who benefits from it, who may be excluded by it, and what form of engagement is needed to move from policy design to institutional adoption.
HTML,
                    <<<'HTML'
A major part of the work is engagement. The Centre for Trade and Business Environment Advocacy engages policy makers, legislators, regulators, development partners, private sector actors, civil society organisations, professional networks, academic bodies, and regional institutions through policy submissions, strategic dialogue, public commentary, technical briefings, and targeted advocacy. Trade and investment climate reform usually requires cooperation among actors who do not automatically share the same priorities. Legislators may focus on statutory authority, regulators on enforcement and institutional control, businesses on compliance costs and market access, development partners on reform milestones, and civil society on accountability and inclusion. The programme creates structured spaces where these perspectives can be brought into conversation around evidence rather than assumption.
HTML,
                    <<<'HTML'
Capacity strengthening is also central to the programme. Many reform failures do not arise only because good ideas are absent; they arise because institutions and stakeholders do not have a shared understanding of the policy problem, the available options, the implementation risks, or the role each actor must play. The Centre for Trade and Business Environment Advocacy supports learning through policy dialogues, workshops, seminars, briefings, and tailored engagements. These activities are designed to build collective understanding among state and non-state actors and to encourage action toward development-oriented trade and regulatory governance reforms. The programme also produces knowledge products such as reports, position papers, and commentary that help stakeholders engage issues beyond a single meeting or project cycle.
HTML,
                    <<<'HTML'
The programme's regional integration work is especially important because Nigeria's economic choices shape, and are shaped by, wider African market arrangements. Regional and continental frameworks can improve scale, encourage specialization, support industrial development, and create new openings for services, technology, logistics, and value-chain participation. Yet implementation depends on domestic readiness, regulatory coordination, credible dispute and enforcement systems, and sustained engagement with firms that must operate under the rules. The Centre for Trade and Business Environment Advocacy examines these links and supports reforms that make regional integration more than a diplomatic aspiration. It asks how commitments can be implemented in ways that are inclusive, transparent, commercially meaningful, and consistent with sustainable development.
HTML,
                    <<<'HTML'
Across this programme, the organisation's role is to help shape clearer reform pathways. That includes clarifying the problem, building an evidence base, identifying institutional responsibilities, convening stakeholders, supporting public-private dialogue, and encouraging policy choices that are technically grounded and politically realistic. The Centre for Trade and Business Environment Advocacy understands that markets contribute meaningfully to development only where they are governed by fair rules, effective institutions, transparent decision-making, and inclusive policy processes. This programme exists to strengthen those conditions in the trade and investment climate space, so that reform can improve competitiveness while also advancing equity, accountability, and sustainable development across Nigeria and the continent.
HTML,
                ],
            ],
            [
                'title' => 'Competition and Consumer Protection',
                'icon' => 'heroicon-o-scale',
                'summary' => 'Research, policy engagement, and advocacy on fair competition, responsible market conduct, consumer welfare, sector regulation, and effective protection against harmful products and unfair practices.',
                'description' => [
                    <<<'HTML'
The Competition and Consumer Protection programme focuses on the conditions that make markets fair, trustworthy, and development-oriented. The Centre for Trade and Business Environment Advocacy recognises that markets do not become equitable simply because private actors are active or because regulation exists on paper. Markets require rules that discourage abuse, institutions that can enforce those rules, consumers who are protected from harm, and policy processes that understand the interaction between competition, sector regulation, innovation, and public welfare. This programme therefore engages the full range of issues that shape responsible market conduct, from anti-competitive practices and unfair business behaviour to consumer rights, regulatory capacity, and the treatment of emerging issues in regulated and digital markets.
HTML,
                    <<<'HTML'
The programme's work focuses on fair competition, responsible market conduct, consumer welfare, and the interaction between competition policy and sector regulation. In practical terms, this means examining whether market rules prevent exclusionary behaviour, whether dominant firms can distort access or choice, whether consumers are given truthful information and safe products, whether regulators have the legal and institutional tools to act, and whether reforms keep pace with changing market realities. The Centre for Trade and Business Environment Advocacy pays particular attention to regulated sectors and digital markets because these spaces often combine innovation, scale, information asymmetry, and concentrated power in ways that traditional policy tools may not fully anticipate.
HTML,
                    <<<'HTML'
Consumer protection is treated as a core development issue, not as a narrow complaints-management function. The organisation is committed to promoting the full gamut of consumer rights and ensuring that laws and policies are adequate in protecting consumers from harmful products and unfair business practices. This includes the right to safety, information, choice, redress, representation, and fair treatment. In many markets, consumers face complex contract terms, misleading claims, unsafe products, opaque pricing, poor service standards, and weak complaint mechanisms. The programme examines these problems in relation to the design of rules, the effectiveness of institutions, and the realities of enforcement. The goal is to support reforms that make protection meaningful in daily market transactions.
HTML,
                    <<<'HTML'
The Centre for Trade and Business Environment Advocacy approaches competition and consumer protection through evidence. Research is the bedrock of the organisation's advocacy, and this programme uses research to identify market failures, regulatory gaps, institutional overlaps, enforcement challenges, and reform opportunities. Evidence may come from legal and policy analysis, stakeholder interviews, market diagnostics, comparative regulatory review, and the assessment of draft laws or regulations. The programme is especially concerned with implementation. A well-written rule may still fail if institutional mandates are unclear, if regulators lack resources, if regulated actors do not understand obligations, if consumers cannot access redress, or if enforcement priorities are not aligned with market realities. Research therefore asks not only what should change but also how change can realistically occur.
HTML,
                    <<<'HTML'
The programme also provides a bridge between different stakeholders whose cooperation is essential to fair market governance. Competition and consumer protection issues often involve regulators, sector agencies, lawmakers, businesses, consumer groups, professional associations, courts, civil society organisations, academics, and development partners. These actors may understand the same market problem differently. A regulator may see an enforcement challenge, a business may see compliance uncertainty, a consumer advocate may see harm, and a legislator may see a gap in statutory authority. The Centre for Trade and Business Environment Advocacy convenes and engages these actors through policy submissions, strategic dialogue, public commentary, workshops, and focused advocacy. Its role is to make discussion more informed, balanced, and oriented toward practical reform.
HTML,
                    <<<'HTML'
An important part of the programme is the relationship between competition policy and sector regulation. Many markets are governed by sector-specific regulators whose mandates include licensing, pricing, quality standards, technical rules, or consumer obligations. Competition authorities may also have a mandate to prevent anti-competitive conduct and protect market structure. When these mandates are not well coordinated, firms may face uncertainty and consumers may remain unprotected. The programme explores how institutional coordination can be improved, how overlapping mandates can be managed, and how sector policy can support rather than undermine competition and consumer welfare. It also considers how public policy choices, including subsidies, procurement, standards, and licensing, can influence market access and competitive outcomes.
HTML,
                    <<<'HTML'
Digital and platform-based markets are a growing concern for the programme. Data-driven business models, online marketplaces, app-based services, digital payments, and algorithmic systems can expand access and improve efficiency, but they can also create new risks. Consumers may face hidden terms, data misuse, discriminatory outcomes, misleading digital interfaces, or weak redress channels. Competitors may encounter gatekeeping, self-preferencing, exclusionary access conditions, or opaque rules imposed by dominant platforms. The Centre for Trade and Business Environment Advocacy engages these issues in a development-sensitive way, recognising both the promise of innovation and the need for accountable governance. The programme supports policy conversations that protect consumers and fair competition without unnecessarily suppressing beneficial innovation.
HTML,
                    <<<'HTML'
Ultimately, the Competition and Consumer Protection programme advances the organisation's wider vision of equitable markets for sustainable development. Fair competition can improve productivity, lower barriers to entry, stimulate innovation, and reduce the ability of powerful actors to extract unfair advantage. Consumer protection can increase trust, improve market participation, and ensure that economic activity respects public welfare. Together, these fields are essential to inclusive market governance. The Centre for Trade and Business Environment Advocacy works to strengthen the quality of policy processes, build institutional and stakeholder capacity, and support reforms that are legally sound, economically informed, politically realistic, and anchored in the public interest.
HTML,
                ],
            ],
            [
                'title' => 'Digital Economy, Innovation and Intellectual Property',
                'icon' => 'heroicon-o-cpu-chip',
                'summary' => 'Policy and advocacy work on digital trade, innovation ecosystems, platform governance, data-driven markets, and intellectual property regimes that support development and shared prosperity.',
                'description' => [
                    <<<'HTML'
The Digital Economy, Innovation and Intellectual Property programme addresses one of the most important frontiers of market governance in Nigeria and across Africa. Digital technologies are reshaping trade, finance, communication, creative production, public services, education, dispute resolution, and the delivery of goods and services. Innovation ecosystems are creating new opportunities for entrepreneurs and firms, while data-driven markets are changing how value is generated, controlled, and distributed. At the same time, intellectual property rules continue to determine how knowledge, creativity, technology, and market access are organised. The Centre for Trade and Business Environment Advocacy works in this programme area to ensure that these changes support development, inclusion, fair competition, and accountable governance.
HTML,
                    <<<'HTML'
The programme engages on digital trade, innovation ecosystems, platform governance, data-driven markets, and intellectual property issues relevant to development and market access. This scope reflects the organisation's integrated approach. Digital economy questions cannot be separated from trade, competition, consumer protection, investment, education, infrastructure, public-sector reform, or regional integration. A digital platform may be a market access channel for small businesses, a source of consumer risk, a competition-policy concern, a data-governance challenge, and an innovation opportunity at the same time. The Centre for Trade and Business Environment Advocacy therefore analyses digital economy issues across legal, policy, governance, and political-economy dimensions rather than treating them as purely technical matters.
HTML,
                    <<<'HTML'
The programme seeks to explore how public and private actors can work together to unleash the potential of the digital economy, accelerate innovation, and reform national, regional, and international intellectual property protection regimes toward shared prosperity. That requires careful attention to both opportunity and constraint. Digital tools can expand access to markets, reduce transaction costs, improve transparency, enable new business models, and connect African firms to regional and global value chains. Yet the benefits of digital transformation can be uneven. Infrastructure gaps, skills deficits, regulatory uncertainty, weak consumer protection, fragmented data rules, limited financing, and exclusionary platform practices can prevent digital markets from advancing equitable development. The programme works to identify these constraints and support practical reform responses.
HTML,
                    <<<'HTML'
Research is central to the programme. The Centre for Trade and Business Environment Advocacy undertakes independent research and collaborates with experts, academics, practitioners, and partner institutions to produce evidence that is policy-relevant and analytically sound. In the digital economy and intellectual property space, research may involve reviewing laws and regulations, assessing draft policy proposals, mapping institutional mandates, examining digital market practices, analysing innovation barriers, and comparing reform models from other jurisdictions. The purpose is to make policy debate more grounded. Digital reform is often discussed in broad slogans about disruption, innovation, or transformation. The programme brings those debates back to concrete questions: Which institutions are responsible? What rights are affected? Which firms can participate? What risks do consumers face? How should rules be enforced?
HTML,
                    <<<'HTML'
The intellectual property dimension of the programme is especially important for development. Intellectual property regimes influence creativity, technology transfer, local innovation, access to knowledge, cultural production, industrial policy, and participation in global markets. The Centre for Trade and Business Environment Advocacy supports reforms that make intellectual property protection more responsive to national, regional, and international development needs. This means considering how rules can protect creators and innovators while also encouraging learning, diffusion, competition, and access. It also means examining administrative capacity, enforcement systems, public awareness, and the relationship between intellectual property institutions and the wider innovation ecosystem. The programme treats intellectual property reform as a governance issue that must serve shared prosperity rather than narrow ownership alone.
HTML,
                    <<<'HTML'
Platform governance and data-driven markets are another priority. Platforms can create powerful network effects, organise access to consumers, determine the visibility of businesses, and shape the terms under which market actors interact. Their rules may affect pricing, ranking, payment, dispute resolution, data access, and business continuity. The Centre for Trade and Business Environment Advocacy examines how platform governance can be made more transparent, fair, and development-oriented. It also considers how data is collected, used, shared, monetised, and protected. Data can improve services and policy decisions, but it can also create new forms of market power and vulnerability. The programme encourages governance frameworks that protect rights, enable innovation, and ensure that digital transformation is accountable.
HTML,
                    <<<'HTML'
Engagement and capacity strengthening are vital because digital economy reforms involve many actors who do not always speak the same language. Technology companies, start-ups, regulators, legislators, consumer advocates, intellectual property offices, universities, creative communities, investors, development partners, and regional bodies may each approach reform from a different perspective. The Centre for Trade and Business Environment Advocacy convenes and engages these stakeholders through policy dialogue, workshops, seminars, briefings, submissions, and public commentary. Its goal is to build collective understanding and action among state and non-state actors. The programme helps translate technical questions into public-policy choices and helps policy actors understand the commercial and social realities that shape implementation.
HTML,
                    <<<'HTML'
The programme's work is anchored in the belief that markets contribute meaningfully to development only where they are governed by fair rules, effective institutions, transparent decision-making, and inclusive policy processes. Digital transformation should not merely reproduce old exclusions in faster form. It should expand opportunity, improve institutional effectiveness, support innovation, protect consumers, and create pathways for African firms and creators to participate more fully in national, regional, and global markets. Through research-led advocacy, multi-stakeholder engagement, knowledge sharing, and bridge-building, the Centre for Trade and Business Environment Advocacy supports digital, innovation, and intellectual property reforms that are ambitious, realistic, and grounded in the public interest.
HTML,
                ],
            ],
            [
                'title' => 'Renewable Energy and Sustainability',
                'icon' => 'heroicon-o-sun',
                'summary' => 'Policy and regulatory engagement on renewable energy, sustainability transitions, green investment, resilient production and consumption, circular economy frameworks, and voluntary sustainability standards.',
                'description' => [
                    <<<'HTML'
The Renewable Energy and Sustainability programme focuses on the policy, regulatory, commercial, and institutional conditions required for sustainable market transformation. The Centre for Trade and Business Environment Advocacy recognises that economic development cannot be separated from energy access, climate resilience, production systems, consumption patterns, investment flows, and the governance of sustainability transitions. Renewable energy and sustainability are not peripheral environmental concerns; they are central to competitiveness, industrial development, public welfare, and the future of trade and investment in Nigeria and across Africa. This programme therefore works at the intersection of market governance, regulatory reform, green investment, and development-oriented sustainability policy.
HTML,
                    <<<'HTML'
The programme focuses on policy and regulatory engagement on renewable energy, sustainability transitions, green investment, and more resilient production and consumption systems. Its work addresses the policy and commercial constraints that slow the development and adoption of renewable energy in Nigeria and Africa. These constraints may include unclear rules, weak incentives, limited financing, fragmented institutional mandates, inadequate infrastructure, uncertain procurement frameworks, insufficient stakeholder coordination, and limited public understanding of available options. The Centre for Trade and Business Environment Advocacy analyses these barriers and supports reform conversations that can move sustainable energy and production systems from aspiration to implementation.
HTML,
                    <<<'HTML'
Renewable energy policy is treated as a market-governance challenge. A transition to cleaner energy requires more than technology. It requires fair rules, effective institutions, transparent decision-making, and inclusive policy processes. Investors need predictable frameworks, communities need protection and participation, consumers need affordable and reliable services, regulators need capacity, and public institutions need coordination. The programme examines how these conditions can be strengthened. It also considers how renewable energy reforms interact with industrial policy, rural development, trade, competition, consumer welfare, and regional integration. By taking an integrated view, the Centre for Trade and Business Environment Advocacy helps stakeholders avoid fragmented reform choices that solve one problem while creating another.
HTML,
                    <<<'HTML'
The sustainability dimension of the programme includes resilient production and consumption, circular economy frameworks, and voluntary sustainability standards. Production systems across agriculture, manufacturing, services, and trade are increasingly shaped by environmental expectations, resource efficiency, waste management, supply-chain transparency, and market-access requirements. Firms that cannot adapt may lose competitiveness, while consumers and communities may bear the cost of unsustainable practices. The Centre for Trade and Business Environment Advocacy supports policy dialogue on how sustainability standards, circular economy approaches, and responsible production practices can be designed and implemented in ways that are development-sensitive. The aim is to encourage sustainability without creating unnecessary exclusion for smaller firms or weaker market participants.
HTML,
                    <<<'HTML'
Research-led advocacy is central to the programme. The organisation undertakes independent research and collaborates with experts, academics, practitioners, and partner institutions to generate evidence that is policy-relevant, analytically sound, and responsive to implementation realities. In renewable energy and sustainability, evidence may include policy mapping, regulatory review, stakeholder analysis, assessment of market barriers, comparison of sustainability frameworks, and examination of how green investment can be mobilised. Research helps identify where reform is needed, which institutions should act, what trade-offs exist, and how policy choices can be sequenced. The Centre for Trade and Business Environment Advocacy uses this evidence to support public-interest advocacy rather than narrow commercial promotion.
HTML,
                    <<<'HTML'
The programme also places strong emphasis on engagement. Sustainability transitions require cooperation among government institutions, regulators, investors, energy developers, utilities, consumers, civil society organisations, researchers, communities, development partners, and regional bodies. These actors often have different priorities and different levels of technical knowledge. The Centre for Trade and Business Environment Advocacy convenes and engages stakeholders through strategic dialogue, policy submissions, workshops, seminars, briefings, public commentary, and targeted advocacy. Its role is to help build shared understanding of the problem, clarify reform options, and create platforms for actors whose cooperation is essential to durable reform outcomes.
HTML,
                    <<<'HTML'
Capacity strengthening is equally important. Renewable energy and sustainability reforms can be slowed by limited institutional capacity, weak stakeholder understanding, and insufficient practical knowledge about implementation. The programme supports learning engagements that help policy makers, regulators, market actors, civil society organisations, and other stakeholders understand evolving sustainability issues. These engagements may address regulatory design, consumer protection in energy markets, green investment readiness, circular economy principles, sustainability reporting, or the relationship between standards and market access. The aim is to strengthen the capacity of institutions and stakeholders to participate meaningfully in reform, rather than leaving sustainability policy to a small group of technical specialists.
HTML,
                    <<<'HTML'
The Centre for Trade and Business Environment Advocacy approaches this programme with a public-interest lens. It asks how renewable energy and sustainability reforms can expand opportunity, reduce vulnerability, improve institutional accountability, and support sustainable development. It recognises that transitions can create winners and losers if they are poorly designed. For that reason, the programme seeks reforms that are not only environmentally desirable but also socially inclusive, commercially realistic, institutionally feasible, and transparent. Through research, engagement, capacity strengthening, and bridge-building, the Renewable Energy and Sustainability programme supports a future in which markets are better aligned with long-term development, responsible production, and equitable access to the benefits of sustainability.
HTML,
                ],
            ],
            [
                'title' => 'Public Sector Transparency and Accountability',
                'icon' => 'heroicon-o-building-library',
                'summary' => 'Policy work on transparency, integrity, accountability, natural resource governance, public resource management, regulatory governance, and accountable public decision-making.',
                'description' => [
                    <<<'HTML'
The Public Sector Transparency and Accountability programme addresses the governance conditions that determine whether markets and public institutions can serve development. The Centre for Trade and Business Environment Advocacy recognises that equitable markets depend not only on private-sector activity but also on public decision-making that is transparent, accountable, informed, and resistant to undue influence. Public institutions shape laws, regulations, procurement, licensing, enforcement, natural resource governance, public resource management, and the operating environment for firms and citizens. When public decision-making is opaque or weakly accountable, market outcomes can become distorted, public trust can decline, and development priorities can be undermined. This programme works to strengthen the integrity and accountability of public governance systems.
HTML,
                    <<<'HTML'
The programme works on transparency, integrity, and accountability in public decision-making, natural resource governance, public resource management, and regulatory governance. Its advocacy addresses the reform of natural resource governance in Nigeria and across Africa, including the establishment of legal frameworks for beneficial ownership disclosure and the promotion of accountable institutions. These issues are deeply connected to market governance. Natural resources, public contracts, regulatory approvals, and public spending all shape economic opportunity. Without transparent rules and accountable institutions, benefits can be captured by narrow interests, competition can be distorted, and citizens may be excluded from the value created by public resources.
HTML,
                    <<<'HTML'
The Centre for Trade and Business Environment Advocacy brings a public-interest perspective to these questions. Policy debates around transparency and accountability are often framed in general anti-corruption language, but durable reform requires more precise analysis. Which decision points create vulnerability? Which institutions have mandates that overlap or conflict? What information should be publicly available? How can disclosure obligations be enforced? How should beneficial ownership transparency support procurement integrity, natural resource governance, and market accountability? What incentives encourage compliance, and what barriers prevent implementation? This programme uses legal, policy, governance, and political-economy analysis to move beyond slogans and toward reform pathways that are technically grounded and politically realistic.
HTML,
                    <<<'HTML'
Research is the bedrock of the programme's advocacy. The organisation undertakes independent research and collaborates with experts, academics, practitioners, and partner institutions to generate evidence that is relevant to policy and responsive to implementation realities. In the transparency and accountability space, this may include mapping laws and institutions, reviewing disclosure frameworks, analysing regulatory governance systems, assessing public resource management arrangements, and identifying gaps in accountability mechanisms. The goal is to create evidence that can support reform conversations, clarify policy options, and help stakeholders understand how accountability failures affect markets, institutions, and development outcomes.
HTML,
                    <<<'HTML'
Natural resource governance is a major focus because natural resources can either support broad-based development or deepen inequality, depending on the quality of governance. The programme examines legal frameworks, institutional responsibilities, public participation, ownership transparency, revenue accountability, and the relationship between resource governance and wider economic policy. Beneficial ownership disclosure is particularly important because hidden ownership can undermine procurement, licensing, taxation, competition, and public trust. The Centre for Trade and Business Environment Advocacy supports reforms that make ownership, control, and public decision-making more visible, while also considering the administrative capacity needed to make disclosure regimes effective.
HTML,
                    <<<'HTML'
Regulatory governance is another important dimension. Regulators shape markets through licensing, standards, enforcement, approvals, sanctions, dispute handling, and public communication. If regulatory decisions are opaque, inconsistent, poorly justified, or vulnerable to capture, markets become less fair and institutions lose credibility. The programme works to strengthen dialogue around transparent and accountable regulatory processes. It asks how regulators can communicate decisions, consult stakeholders, manage conflicts of interest, coordinate with other institutions, and enforce rules fairly. This connects directly with the organisation's wider work in trade, competition, consumer protection, digital governance, and sustainability, because each of those areas depends on credible public institutions.
HTML,
                    <<<'HTML'
The programme relies heavily on engagement and bridge-building. Transparency and accountability reforms require cooperation among policy makers, legislators, regulators, civil society organisations, professional networks, research bodies, development partners, private sector stakeholders, media actors, and communities. These actors may agree that accountability matters while disagreeing on priorities, methods, or institutional responsibilities. The Centre for Trade and Business Environment Advocacy creates platforms for informed dialogue, policy submissions, public commentary, workshops, seminars, and targeted advocacy. Its convening role helps bring together actors who may not otherwise occupy the same space but whose cooperation is essential to reform.
HTML,
                    <<<'HTML'
Capacity strengthening is also part of the programme. Accountability reforms are weakened when stakeholders lack the knowledge, tools, or institutional confidence to participate meaningfully. The organisation supports briefings, dialogues, and learning engagements that help stakeholders understand legal obligations, governance standards, policy options, and implementation challenges. It also produces knowledge products for wider dissemination and use. Through this work, the Public Sector Transparency and Accountability programme advances the organisation's mission to promote collective understanding and action among state and non-state actors toward development-oriented trade and regulatory governance reforms. Its ultimate purpose is to strengthen public decision-making so that markets are governed by fair rules, effective institutions, transparent processes, and a clear commitment to sustainable development.
HTML,
                ],
            ],
        ];
    }

    /**
     * @return array<int, array{name: string, description: string, action_text: string}>
     */
    protected function publicationTypes(): array
    {
        return [
            [
                'name' => 'Report',
                'description' => 'Diagnostic research and institutional analysis from the Centre for Trade and Business Environment Advocacy, including structured evidence products that support validation, policy dialogue, and reform pathway-shaping.',
                'action_text' => 'Access the report',
            ],
            [
                'name' => 'Position Papers',
                'description' => 'Issue-specific policy papers from the Centre for Trade and Business Environment Advocacy, prepared to clarify reform options, strengthen stakeholder dialogue, and support development-oriented regulatory governance.',
                'action_text' => 'Access the position paper',
            ],
        ];
    }

    /**
     * @return array<int, array{type: string, service: ?string, title: string, summary: string}>
     */
    protected function publications(): array
    {
        return [
            [
                'type' => 'Report',
                'service' => 'Trade, Investment Climate and Regional Integration',
                'title' => 'Mapping and Analysis of the Federal Policies, Laws, Regulations and Bills Relevant to Trade and Competitiveness of MSMEs in Nigeria',
                'summary' => 'A diagnostic report mapping federal policies, laws, regulations, and bills relevant to trade and MSME competitiveness in Nigeria, developed to provide a structured evidence base for validation, policy dialogue, reform recommendations, and follow-on support.',
            ],
            [
                'type' => 'Position Papers',
                'service' => 'Trade, Investment Climate and Regional Integration',
                'title' => 'Position Paper on Fostering a Modern Commodity Exchange Ecosystem in Nigeria',
                'summary' => 'A position paper addressing commodity exchange reform, warehouse receipt issues, market infrastructure, and the policy pathway needed to strengthen transparent, finance-linked, and competitive commodity markets in Nigeria.',
            ],
            [
                'type' => 'Position Papers',
                'service' => 'Digital Economy, Innovation and Intellectual Property',
                'title' => 'Position Paper on the Draft SEC Regulation on Crowdfunding',
                'summary' => 'A policy paper examining Nigeria\'s draft crowdfunding regulation, with attention to innovation, digital finance, investor protection, platform conduct, regulatory implementation, and practical refinement of the crowdfunding framework.',
            ],
            [
                'type' => 'Position Papers',
                'service' => 'Trade, Investment Climate and Regional Integration',
                'title' => 'Position Paper on the Factoring Assignments (Establishment, Etc) Bill, 2019',
                'summary' => 'A position paper on factoring reform and the Factoring Assignments Bill, focused on the legal and institutional conditions required to support receivables finance, MSME working capital, and trade competitiveness.',
            ],
            [
                'type' => 'Position Papers',
                'service' => 'Trade, Investment Climate and Regional Integration',
                'title' => 'Position Paper on The Franchise Bill, 2019',
                'summary' => 'A policy paper on franchising reform in Nigeria, addressing the legislative framework, ecosystem coordination, fair commercial practice, enterprise expansion, consumer confidence, and public-private dialogue.',
            ],
            [
                'type' => 'Position Papers',
                'service' => 'Digital Economy, Innovation and Intellectual Property',
                'title' => 'Position Paper on Reforming the Intellectual Property Law and Administration in Nigeria',
                'summary' => 'A position paper on reforming Nigeria\'s intellectual property law and administration to better support innovation, creativity, market access, institutional effectiveness, and development-oriented knowledge governance.',
            ],
            [
                'type' => 'Position Papers',
                'service' => 'Trade, Investment Climate and Regional Integration',
                'title' => 'Position Paper on the International Trade Commission of Nigeria Bill and the Need for a Trade Remedies Regime in Nigeria',
                'summary' => 'A policy paper addressing the International Trade Commission of Nigeria Bill and the need for a trade remedies regime that can support fair trade governance, institutional effectiveness, and Nigeria\'s participation in regional and continental markets.',
            ],
        ];
    }

    /**
     * @return array<int, array{question: string, answer: array<int, string>, page: array<int, string>, category: string}>
     */
    protected function faqs(): array
    {
        return [
            [
                'question' => 'What is the Centre for Trade and Business Environment Advocacy?',
                'answer' => [
                    'The Centre for Trade and Business Environment Advocacy is an independent Nigerian non-profit policy, research, and advocacy organisation dedicated to promoting equitable markets for sustainable development in Nigeria and across Africa. It works at the intersection of law, economics, governance, and public policy to support reforms that improve market outcomes and strengthen public-interest policy processes.',
                ],
                'page' => ['home', 'about', 'faqs'],
                'category' => 'Institutional Profile',
            ],
            [
                'question' => 'When was the Centre for Trade and Business Environment Advocacy established?',
                'answer' => [
                    'The Centre for Trade and Business Environment Advocacy was established in 2018. The organisation was founded in response to a persistent gap in policy and governance debates affecting economic transformation, regulatory effectiveness, market inclusion, and sustainable development.',
                ],
                'page' => ['home', 'about', 'faqs'],
                'category' => 'Institutional Profile',
            ],
            [
                'question' => 'What is the mission of the Centre for Trade and Business Environment Advocacy?',
                'answer' => [
                    'The mission of the Centre for Trade and Business Environment Advocacy is to promote collective understanding and action among state and non-state actors towards development-oriented trade and regulatory governance reforms.',
                ],
                'page' => ['home', 'about', 'faqs'],
                'category' => 'Mission and Vision',
            ],
            [
                'question' => 'What is the vision of the Centre for Trade and Business Environment Advocacy?',
                'answer' => [
                    'The vision of the Centre for Trade and Business Environment Advocacy is to be a respected and influential voice for the promotion of equitable markets for sustainable development.',
                ],
                'page' => ['home', 'about', 'faqs'],
                'category' => 'Mission and Vision',
            ],
            [
                'question' => 'What programme areas does the Centre for Trade and Business Environment Advocacy work across?',
                'answer' => [
                    'The Centre for Trade and Business Environment Advocacy works across five interrelated programme areas: Trade, Investment Climate and Regional Integration; Competition and Consumer Protection; Digital Economy, Innovation and Intellectual Property; Renewable Energy and Sustainability; and Public Sector Transparency and Accountability.',
                ],
                'page' => ['home', 'services', 'faqs'],
                'category' => 'Programme Areas',
            ],
            [
                'question' => 'How does the Centre for Trade and Business Environment Advocacy work?',
                'answer' => [
                    'The organisation combines four mutually reinforcing modes of work: research and policy analysis, policy engagement and advocacy, capacity strengthening and knowledge sharing, and convening and bridge-building. Its work is research-led and designed to support reforms that are technically grounded, politically realistic, and responsive to implementation realities.',
                ],
                'page' => ['home', 'about', 'services', 'faqs'],
                'category' => 'Approach',
            ],
            [
                'question' => 'Who does the Centre for Trade and Business Environment Advocacy engage with?',
                'answer' => [
                    'The Centre for Trade and Business Environment Advocacy engages policy makers, legislators, regulators, development partners, private sector actors, civil society organisations, academic and research bodies, professional networks, regional bodies, and members of the public with an interest in its work.',
                ],
                'page' => ['about', 'contact', 'faqs'],
                'category' => 'Partnerships',
            ],
            [
                'question' => 'What kinds of publications does the Centre for Trade and Business Environment Advocacy produce?',
                'answer' => [
                    'The organisation produces diagnostic reports, position papers, and commentary outputs. Its knowledge work combines research, policy analysis, issue-specific reform advocacy, and shorter public-facing resources across its five programme areas.',
                ],
                'page' => ['faqs'],
                'category' => 'Publications',
            ],
            [
                'question' => 'Where is the Centre for Trade and Business Environment Advocacy located?',
                'answer' => [
                    'The Centre for Trade and Business Environment Advocacy is based in Abuja, Nigeria. The approved contact address for the website is No. 46, Agadez Crescent, Wuse 2, Abuja-FCT, Nigeria.',
                ],
                'page' => ['contact', 'faqs'],
                'category' => 'Contact',
            ],
            [
                'question' => 'How can I contact the Centre for Trade and Business Environment Advocacy?',
                'answer' => [
                    'You can contact the Centre for Trade and Business Environment Advocacy by email at info@centre-tba.org or by telephone on +234 812 631 7786. The organisation welcomes enquiries from policy makers, researchers, development partners, civil society organisations, private sector stakeholders, and members of the public.',
                ],
                'page' => ['contact', 'faqs'],
                'category' => 'Contact',
            ],
        ];
    }

    /**
     * @return array<int, array{service: string, title: string, partner: ?string, location: string, summary: string, content: array<int, string>}>
     */
    protected function caseStudies(): array
    {
        return [
            [
                'service' => 'Trade, Investment Climate and Regional Integration',
                'title' => 'Federal MSME Trade and Competitiveness Mapping',
                'partner' => 'GIZ-SEDIN/NICOP',
                'location' => 'Nigeria',
                'summary' => 'A federal-level mapping and analysis of policies, laws, regulations, and bills affecting MSME trade and competitiveness in Nigeria.',
                'content' => [
                    <<<'HTML'
This engagement focused on a federal-level mapping and analysis of policies, laws, regulations, and bills affecting MSME trade and competitiveness in Nigeria under the GIZ-SEDIN/NICOP framework. The Centre for Trade and Business Environment Advocacy approached the assignment as a practical reform diagnostic rather than a document catalogue. The work examined how formal rules, pending legislative proposals, regulatory mandates, administrative procedures, and institutional practices shaped the ability of micro, small, and medium enterprises to trade, compete, comply, and grow. It responded to the need for a clearer evidence base in a policy environment where enterprise constraints are often discussed generally, but the precise legal and institutional sources of those constraints are not always mapped with enough structure to support reform.
HTML,
                    <<<'HTML'
The work sat squarely within the organisation's research-led advocacy model. The Centre for Trade and Business Environment Advocacy used legal, policy, governance, and political-economy analysis to identify the instruments that mattered for MSME competitiveness and to explain why they mattered. The mapping considered the relationship between federal rules and market outcomes, the interaction of public institutions, and the ways in which apparently technical provisions could create barriers or opportunities for smaller firms. It also helped distinguish between problems that required legislative amendment, regulatory clarification, institutional coordination, or further stakeholder engagement. That distinction was important because effective reform depends on knowing both the substance of the problem and the pathway through which change can realistically occur.
HTML,
                    <<<'HTML'
The diagnostic process generated a structured evidence base that could be used by stakeholders in validation, policy dialogue, and follow-on reform support. Instead of leaving stakeholders with scattered observations, the assignment organised findings in a form that made them easier to test, discuss, and prioritise. It helped policy actors, private-sector representatives, regulators, and development partners see how different legal and regulatory issues connected to enterprise competitiveness. It also supported a more informed conversation about reform sequencing, because not every problem could be addressed through the same institution or within the same timeframe. The evidence base therefore became a tool for dialogue as much as a research output.
HTML,
                    <<<'HTML'
The engagement produced reform recommendations and six position papers. These outputs translated the mapping into more focused advocacy and policy materials, allowing stakeholders to move from broad diagnosis to specific reform questions. Position papers are especially useful where reform processes involve many actors with different levels of technical knowledge. They provide a bridge between detailed analysis and practical engagement, making it possible to explain the problem, set out the policy implications, and identify possible routes forward. In this case, the position papers helped carry the evidence into validation processes and wider reform conversations.
HTML,
                    <<<'HTML'
The result and legacy of the assignment was a clearer foundation for public-private dialogue on MSME trade and competitiveness. The work helped stakeholders understand the legal and regulatory environment with greater precision and created a basis for follow-on support in related workstreams. It also demonstrated the Centre for Trade and Business Environment Advocacy's institutional strength: moving from research and diagnosis to stakeholder mobilisation, policy dialogue, and reform pathway-shaping. The assignment showed how credible evidence can improve the quality of policy processes and help reform actors focus on practical changes that can make markets more inclusive, competitive, and development-oriented.
HTML,
                ],
            ],
            [
                'service' => 'Trade, Investment Climate and Regional Integration',
                'title' => 'MSME Reform Support Across Federal Laws and Regulations',
                'partner' => 'GIZ-SEDIN/NICOP',
                'location' => 'Nigeria',
                'summary' => 'Technical support to selected reform processes affecting MSMEs through legal analysis, stakeholder mobilisation, reform tracking, and public-private dialogue.',
                'content' => [
                    <<<'HTML'
This engagement provided technical support to reform processes relating to selected federal laws and regulations affecting MSMEs in Nigeria. The Centre for Trade and Business Environment Advocacy supported the work through legal and policy analysis, stakeholder mobilisation, reform tracking, regulator engagement, and assistance to public-private dialogue. The assignment recognised that MSME reform is rarely solved by a single law or one consultation. Smaller enterprises are affected by the cumulative effect of many rules, institutions, approvals, financing constraints, market-access conditions, and enforcement practices. Reform therefore required a disciplined process that could connect evidence, stakeholders, institutional responsibilities, and follow-through.
HTML,
                    <<<'HTML'
The support covered workstreams linked to factoring, franchising, crowdfunding, and commodities exchange reform. Each workstream presented a different market problem, but all were connected by a wider concern: how to improve the business environment for smaller firms and strengthen the systems through which they can access finance, expand operations, reach markets, and participate in structured commercial relationships. Factoring reform spoke to working capital and receivables finance. Franchising reform addressed business models, standards, and expansion pathways. Crowdfunding reform connected enterprise finance with digital market governance and investor protection. Commodities exchange reform linked agricultural and commodity markets with storage, finance, transparency, and capital-market infrastructure.
HTML,
                    <<<'HTML'
The Centre for Trade and Business Environment Advocacy's role was not limited to producing technical commentary. The organisation helped stakeholders understand where reform was possible, which actors needed to be engaged, and how reform movement could be tracked. This is important because reform processes often lose momentum after diagnostic work is completed. A report may identify the problem, but implementation still depends on regulators, legislators, private-sector actors, development partners, professional networks, and civil society organisations understanding their roles and continuing to participate. By combining analysis with mobilisation and tracking, the engagement helped keep attention on practical next steps.
HTML,
                    <<<'HTML'
The public-private dialogue element was central. MSME-related reforms require trust and communication between public institutions and market actors. Regulators may be concerned about risk, consumer protection, investor protection, or institutional mandate. Private-sector stakeholders may focus on compliance burdens, market uncertainty, cost, and commercial feasibility. Development partners may prioritise reform milestones and measurable outcomes. The Centre for Trade and Business Environment Advocacy helped create a more structured space where these perspectives could be brought into conversation around evidence. This reflected the organisation's bridge-building approach and its commitment to improving the quality of policy processes, not merely the content of policy proposals.
HTML,
                    <<<'HTML'
The result of the engagement was clearer reform pathways and stronger coordination among stakeholders across the workstreams. Its legacy lies in the way it connected diagnosis with process. The assignment helped move reform conversations beyond isolated technical recommendations and toward more organised engagement with institutions and market actors. It also demonstrated the value of development-oriented regulatory governance: reforms should be legally sound, commercially realistic, institutionally feasible, and responsive to the needs of smaller enterprises. By supporting this work, the Centre for Trade and Business Environment Advocacy contributed to a more coherent environment for MSME competitiveness and market inclusion.
HTML,
                ],
            ],
            [
                'service' => 'Trade, Investment Climate and Regional Integration',
                'title' => 'Factoring Reform and Working Group Reactivation',
                'partner' => null,
                'location' => 'Nigeria',
                'summary' => 'Support for the reactivation and expansion of the National Factoring Working Group and a more structured pathway for factoring reform in Nigeria.',
                'content' => [
                    <<<'HTML'
This engagement supported the reactivation and expansion of the National Factoring Working Group and contributed to a more structured regulatory and legislative pathway for factoring reform in Nigeria. Factoring is important for MSME competitiveness because many smaller enterprises struggle with delayed payments, limited collateral, restricted access to conventional credit, and weak bargaining power in supply chains. Receivables finance can help enterprises convert outstanding invoices into working capital, enabling them to meet obligations, accept orders, sustain operations, and participate more effectively in trade. The reform issue was therefore not only financial-sector technicality; it was a market-access and enterprise-development concern.
HTML,
                    <<<'HTML'
The Centre for Trade and Business Environment Advocacy approached the assignment through its integrated model of research, stakeholder engagement, and reform pathway-shaping. The work recognised that factoring requires an enabling legal and regulatory framework, clarity on assignments of receivables, confidence among financiers and businesses, and coordination among public and private actors. Without these elements, the market can remain underdeveloped even where the need is clear. The organisation helped anchor reform discussions in a working-group process, ensuring that stakeholders could examine the relevant legal, institutional, and commercial questions through an organised platform rather than disconnected conversations.
HTML,
                    <<<'HTML'
Diagnostic and validation activity formed an important part of the engagement. Factoring reform involves technical questions that must be tested with the actors who understand the market, including financial institutions, enterprises, regulators, legislators, professional advisers, and development partners. The Centre for Trade and Business Environment Advocacy supported a process through which evidence and proposals could be discussed, refined, and validated. This helped stakeholders distinguish between the existence of a policy aspiration and the concrete steps required to make the reform workable. It also helped bring attention to implementation issues that may not be visible in statutory drafting alone.
HTML,
                    <<<'HTML'
The reactivated and expanded working group provided a more durable institutional setting for reform discussion. Working groups can be valuable when they are more than ceremonial. They create continuity, allow specialised actors to contribute over time, and help track how recommendations move through regulatory and legislative channels. In this case, the working-group process supported a continuing reform trajectory and helped make the path for factoring reform more structured. The Centre for Trade and Business Environment Advocacy's contribution was consistent with its commitment to convening and bridge-building among actors whose cooperation is essential to meaningful reform.
HTML,
                    <<<'HTML'
The legacy of the engagement was a stronger foundation for factoring reform in Nigeria. It helped move the issue from general recognition of a financing gap to a more organised conversation about regulatory and legislative action. It also linked the reform to wider MSME competitiveness, trade, and investment climate priorities. By supporting diagnostic work, stakeholder validation, and working-group coordination, the Centre for Trade and Business Environment Advocacy contributed to a reform process that was technically grounded, institutionally aware, and oriented toward practical market outcomes for smaller enterprises. The process also helped keep reform actors focused on implementation after the initial diagnostic phase.
HTML,
                ],
            ],
            [
                'service' => 'Trade, Investment Climate and Regional Integration',
                'title' => 'Franchising Reform and Public-Private Dialogue',
                'partner' => null,
                'location' => 'Nigeria',
                'summary' => 'Convening and technical support for franchising reform through legislative review, ecosystem coordination, and public-private dialogue.',
                'content' => [
                    <<<'HTML'
This engagement centred on franchising reform and the need to build a more coherent legal, policy, and stakeholder foundation for the franchise ecosystem in Nigeria. The Centre for Trade and Business Environment Advocacy convened key ecosystem actors and supported legislative review, stakeholder coordination, and public-private dialogue. Franchising was treated as a market-development issue, not simply as a contract model. A strong franchise environment can help enterprises expand, protect brand value, transfer business methods, create jobs, support standards, attract investment, and provide consumers with more reliable goods and services. But those outcomes depend on rules and institutions that support trust, clarity, and fair dealing.
HTML,
                    <<<'HTML'
The assignment recognised that franchising reform requires participation from multiple actors. Franchise owners, prospective franchisees, lawyers, business associations, regulators, legislators, investors, consumer-interest actors, and development partners may each see different parts of the problem. Some actors may focus on disclosure and fair contracting. Others may focus on enterprise growth, market confidence, intellectual property, dispute resolution, or consumer protection. The Centre for Trade and Business Environment Advocacy helped bring these perspectives into a more organised conversation, creating space for ecosystem actors to engage the legislative and policy questions with evidence and practical experience.
HTML,
                    <<<'HTML'
Legislative review was a key part of the support. Franchise reform can be weakened when laws are drafted without enough attention to market realities or institutional feasibility. The organisation's work helped examine the legislative framework in relation to the needs of the ecosystem, the obligations of parties, the protection of weaker participants, and the wider objective of responsible market development. This required looking beyond formal legal text to the practical implications of the proposed framework. A law that is too vague may not build confidence, while a law that is too burdensome may discourage legitimate market activity. The task was to support a balanced reform conversation.
HTML,
                    <<<'HTML'
Public-private dialogue helped strengthen the constituency for reform. Franchising sits between public regulation and private commercial practice, so reform requires trust between the institutions that shape the rules and the actors expected to operate under them. The Centre for Trade and Business Environment Advocacy's convening role enabled stakeholders to discuss concerns, clarify assumptions, and build shared understanding of why reform mattered. This reflected the organisation's wider mission to promote collective understanding and action among state and non-state actors toward development-oriented trade and regulatory governance reforms.
HTML,
                    <<<'HTML'
The engagement contributed to measurable legislative movement during the period of support and strengthened the constituency for franchise reform. Its legacy was not only movement in a formal process but also greater visibility for franchising as a legitimate business environment reform issue. By supporting dialogue, coordination, and legislative review, the Centre for Trade and Business Environment Advocacy helped move franchising from a fragmented conversation to a more structured reform priority. The work demonstrated how evidence, convening, and technical support can improve the prospects for rules that are commercially meaningful, institutionally feasible, and aligned with equitable market development.
HTML,
                ],
            ],
            [
                'service' => 'Digital Economy, Innovation and Intellectual Property',
                'title' => 'Crowdfunding Framework Dialogue and Regulatory Refinement',
                'partner' => null,
                'location' => 'Nigeria',
                'summary' => 'Stakeholder mobilisation and regulator engagement to strengthen implementation dialogue around Nigeria\'s crowdfunding framework.',
                'content' => [
                    <<<'HTML'
This engagement focused on strengthening dialogue around implementation and future refinement of Nigeria's crowdfunding framework. The Centre for Trade and Business Environment Advocacy mobilised stakeholders and engaged regulators and market actors to examine how the framework could work in practice. Crowdfunding sits at the intersection of finance, innovation, digital markets, investor protection, and enterprise development. It can expand access to finance for businesses and projects that may not fit traditional lending channels, but it also creates risks around disclosure, investor confidence, platform conduct, fraud prevention, and regulatory oversight. The reform conversation therefore required a balance between market opportunity and public-interest safeguards.
HTML,
                    <<<'HTML'
The organisation approached the issue through its digital economy, innovation, and regulatory governance lens. Crowdfunding is enabled by digital platforms, but its success depends on more than technology. It requires clear rules, credible platforms, informed issuers, protected investors, capable regulators, and a market environment in which participants understand their responsibilities. The Centre for Trade and Business Environment Advocacy helped stakeholders examine these connections and encouraged discussion that went beyond whether crowdfunding should exist. The more important question was how the framework could be implemented in a way that supports enterprise finance while maintaining trust and accountability.
HTML,
                    <<<'HTML'
Stakeholder mobilisation was important because crowdfunding affects a wide range of actors. Regulators may focus on market integrity and investor protection. Entrepreneurs may focus on access to finance and compliance costs. Platforms may focus on operational requirements and market development. Investors may need information, transparency, and redress. Development partners and policy actors may see crowdfunding as one possible tool for enterprise growth. By bringing these actors into dialogue, the Centre for Trade and Business Environment Advocacy helped consolidate a policy conversation around implementation, market diagnostics, and possible regulatory refinement.
HTML,
                    <<<'HTML'
The engagement also reflected the organisation's commitment to research-led advocacy. A digital finance framework should be assessed against actual market realities, not only formal regulatory design. Stakeholders needed to consider whether the rules were clear, whether market actors understood them, whether compliance expectations were realistic, whether gaps existed, and whether further refinement might be needed as the market evolved. The Centre for Trade and Business Environment Advocacy's role was to help make that conversation more structured, evidence-informed, and attentive to implementation. This reduced the risk that the framework would remain a paper reform without meaningful market uptake.
HTML,
                    <<<'HTML'
The result and legacy of the engagement was a better organised discussion on Nigeria's crowdfunding framework and its future development. The work helped clarify how market actors understood the rules, what implementation challenges might arise, and how regulatory refinement could support both innovation and protection. It also demonstrated the organisation's ability to engage emerging digital-market issues in a development-sensitive way. By supporting dialogue among regulators, platforms, enterprises, and other stakeholders, the Centre for Trade and Business Environment Advocacy contributed to a reform conversation that connected innovation, finance, market access, and accountable governance.
HTML,
                ],
            ],
            [
                'service' => 'Trade, Investment Climate and Regional Integration',
                'title' => 'Commodity Exchange and Warehouse Receipt Reform Pathway',
                'partner' => null,
                'location' => 'Nigeria',
                'summary' => 'Policy engagement that helped move warehouse receipt and commodity market issues into the broader capital-markets reform process.',
                'content' => [
                    <<<'HTML'
This engagement contributed to policy discussions that helped move warehouse receipt and commodity market issues into the broader capital-markets reform process in Nigeria. The Centre for Trade and Business Environment Advocacy approached commodity exchange reform as an integrated market-governance issue. Commodity markets are connected to trade, agricultural production, storage infrastructure, finance, standards, price discovery, market transparency, and investment. When the rules and institutions around warehouse receipts and commodity exchanges are weak, producers and market actors can face uncertainty, limited access to finance, poor quality assurance, and reduced confidence in structured trading systems.
HTML,
                    <<<'HTML'
The work recognised that commodity exchange reform cannot be treated as an isolated technical matter. Warehouse receipts can support financing by allowing stored commodities to become bankable assets, but that depends on trust in storage, grading, documentation, enforcement, and market infrastructure. Commodity exchanges can improve transparency and market access, but only where participants trust the rules and institutions. The Centre for Trade and Business Environment Advocacy helped frame these issues as part of a wider reform process affecting capital markets, trade competitiveness, and enterprise development. This framing was important because fragmented reforms often fail to address the institutional links that make markets work.
HTML,
                    <<<'HTML'
Policy engagement required attention to multiple stakeholders and policy objectives. Agricultural producers, traders, warehouse operators, financial institutions, regulators, legislators, commodities exchanges, investors, and development partners may all have a stake in the system, but they do not necessarily approach reform from the same perspective. Some are concerned with market integrity and investor protection. Others focus on financing, standards, logistics, or market access. The Centre for Trade and Business Environment Advocacy supported discussion that could bring these concerns into a more coherent reform pathway, consistent with its convening and bridge-building role.
HTML,
                    <<<'HTML'
The engagement also drew on the organisation's legal and policy analysis strengths. Moving warehouse receipt and commodity market issues into a broader capital-markets reform process required understanding how legislative pathways, regulatory mandates, market practices, and institutional coordination interacted. The organisation's contribution helped stakeholders see that the reform was not only about creating or recognising a market instrument. It was also about building the legal and institutional confidence needed for market participants to use that instrument effectively. This kind of analysis is central to development-oriented regulatory governance.
HTML,
                    <<<'HTML'
The result was support for an integrated legislative pathway later reflected in Nigeria's updated investment and securities framework. The legacy of the engagement was the positioning of commodity exchange and warehouse receipt issues within a broader reform conversation, where they could be understood in relation to finance, trade, market infrastructure, and competitiveness. By helping stakeholders connect these issues, the Centre for Trade and Business Environment Advocacy contributed to a reform process that was more coherent, more commercially relevant, and more likely to support transparent and inclusive commodity markets.
HTML,
                ],
            ],
            [
                'service' => 'Digital Economy, Innovation and Intellectual Property',
                'title' => 'Judicial Digitalisation Dialogue on Virtual Court Hearings',
                'partner' => 'NICOP-SEDIN',
                'location' => 'Nigeria',
                'summary' => 'A multi-stakeholder dialogue on the adoption of virtual court hearings in Nigeria and the institutional issues in judicial modernisation.',
                'content' => [
                    <<<'HTML'
This engagement involved the organisation of a multi-stakeholder dialogue with NICOP-SEDIN on the adoption of virtual court hearings in Nigeria. The Centre for Trade and Business Environment Advocacy helped bring together judiciary, government, legal, private sector, development, and media stakeholders to examine the legal, technical, and institutional issues involved in judicial modernisation. The timing and subject matter were significant because virtual hearings required more than the availability of digital tools. They required judicial confidence, procedural clarity, institutional readiness, stakeholder acceptance, and a practical understanding of how technology could support access to justice and continuity of court operations.
HTML,
                    <<<'HTML'
The dialogue reflected the organisation's broader work on digital governance, innovation, and public-sector accountability. Digitalisation in the justice system affects the legal profession, businesses, litigants, judges, court administrators, technology providers, public institutions, and the wider public. It can improve efficiency and resilience, but it can also raise concerns about due process, access, connectivity, record management, open justice, data security, and institutional capacity. The Centre for Trade and Business Environment Advocacy's role was to create a platform where these issues could be discussed by the actors whose cooperation was essential to any durable reform outcome.
HTML,
                    <<<'HTML'
The engagement used convening as a reform tool. The organisation's approach recognises that many policy problems persist because relevant actors do not occupy the same room or do not have a structured opportunity to test assumptions against each other. In this dialogue, stakeholders from the judiciary, government, the legal profession, private sector, development institutions, and media could examine both the promise and the practical demands of virtual hearings. This helped move the conversation beyond abstract support for digitalisation toward the institutional questions that determine whether digital reform can be adopted credibly and sustained over time.
HTML,
                    <<<'HTML'
The dialogue also connected technology to market and governance outcomes. A justice system that can operate more effectively supports business confidence, contract enforcement, regulatory accountability, and public trust. Virtual hearings can reduce disruption, improve access in appropriate cases, and support modernisation where implemented with safeguards. At the same time, digital adoption must be legally sound, inclusive, and attentive to the users of the court system. The Centre for Trade and Business Environment Advocacy helped frame virtual hearings as a practical governance reform rather than a purely technical adjustment, consistent with its integrated approach to law, economics, governance, and public policy.
HTML,
                    <<<'HTML'
The legacy of the engagement is visible in the mainstreaming of virtual hearings in most courts of record in Nigeria. The dialogue contributed to the institutional conversation that helped make judicial digitalisation more acceptable and actionable. It demonstrated the Centre for Trade and Business Environment Advocacy's capacity to convene diverse stakeholders, support evidence-informed dialogue, and contribute to reform processes that improve public-sector effectiveness. Within the organisation's wider selected experience, this case shows how bridge-building can help policy actors move from uncertainty to adoption when reform requires legal, technical, institutional, and stakeholder alignment.
HTML,
                ],
            ],
        ];
    }

    /**
     * @param  array<int, string>  $paragraphs
     */
    protected function caseStudyHtml(array $paragraphs): string
    {
        return $this->html([
            ...$paragraphs,
            'Across this engagement, the wider significance was the same: the Centre for Trade and Business Environment Advocacy helped translate approved evidence and stakeholder experience into a more usable reform narrative. The work strengthened institutional memory, gave reform actors clearer language for discussing the issue, and connected technical findings to the organisation\'s wider mission of promoting equitable markets for sustainable development. It also showed how research, dialogue, capacity strengthening, and bridge-building can help public and private actors move from fragmented concern toward more practical and accountable reform action.',
        ]);
    }

    /**
     * @param  array<int, string>  $paragraphs
     */
    protected function html(array $paragraphs): string
    {
        return collect($paragraphs)
            ->map(fn (string $paragraph): string => '<p>'.$paragraph.'</p>')
            ->implode("\n\n");
    }
}
